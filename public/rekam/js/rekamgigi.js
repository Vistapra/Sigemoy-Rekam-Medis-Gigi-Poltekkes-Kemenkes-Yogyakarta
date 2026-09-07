jQuery(function() {
    var currentZoom = 1;
    var zoomStep = 0.1;
    var maxZoom = 3;
    var minZoom = 0.5;
    var isDragging = false;
    var startX, startY, translateX = 0,
        translateY = 0;

    function setZoom(zoom) {
        currentZoom = Math.max(minZoom, Math.min(maxZoom, zoom));
        updateTransform();
    }

    function updateTransform() {
        var svg = $('#odontograma svg');
        svg.css('transform', `translate(${translateX}px, ${translateY}px) scale(${currentZoom})`);
    }

    function getColorForCondition(condition) {
        switch (condition) {
            case "_":
                return "#bda25c";
            case "∑":
                return "#fe8024";
            case "Ο":
                return "#ff2e2e";
            case "X":
                return "#b1b1b1";
            case "V":
                return "#2d28ff";
            case "⚫":
                return "#2bc155";
            default:
                return "#FFFFFF";
        }
    }

    function drawDiente(svg, parentGroup, diente) {
        if (!diente) throw new Error('Error: no se ha especificado el diente.');

        var x = diente.x || 0,
            y = diente.y || 0;
        var color = getColorForCondition(diente.id);
        var stroke = 'navy';
        var strokeWidth = 0.5;

        var defaultPolygon = {
            fill: color,
            stroke: stroke,
            strokeWidth: strokeWidth
        };

        var dienteGroup = svg.group(parentGroup, {
            transform: 'translate(' + x + ',' + y + ')'
        });

        var caraSuperior = svg.polygon(dienteGroup, [
            [0, 0],
            [20, 0],
            [15, 5],
            [5, 5]
        ], defaultPolygon);
        var caraInferior = svg.polygon(dienteGroup, [
            [5, 15],
            [15, 15],
            [20, 20],
            [0, 20]
        ], defaultPolygon);
        var caraDerecha = svg.polygon(dienteGroup, [
            [15, 5],
            [20, 0],
            [20, 20],
            [15, 15]
        ], defaultPolygon);
        var caraIzquierda = svg.polygon(dienteGroup, [
            [0, 0],
            [5, 5],
            [5, 15],
            [0, 20]
        ], defaultPolygon);
        var caraCentral = svg.polygon(dienteGroup, [
            [5, 5],
            [15, 5],
            [15, 15],
            [5, 15]
        ], defaultPolygon);
        var caraCompleto = svg.text(dienteGroup, 6, 30, diente.id.toString(), {
            fill: 'navy',
            stroke: 'navy',
            strokeWidth: 0.1,
            style: 'font-size: 6pt;font-weight:normal'
        });

        [caraSuperior, caraInferior, caraDerecha, caraIzquierda, caraCentral, caraCompleto].forEach(
            function(cara) {
                $(cara).click(function() {
                    $("#element_gigi").val(diente.id);
                }).hover(
                    function() {
                        $(this).attr('fill', 'yellow');
                    },
                    function() {
                        $(this).attr('fill', color);
                    }
                );
            });

        $(caraSuperior).data('cara', 'S');
        $(caraInferior).data('cara', 'I');
        $(caraDerecha).data('cara', 'D');
        $(caraIzquierda).data('cara', 'Z');
        $(caraCentral).data('cara', 'C');
        $(caraCompleto).data('cara', 'X');
    }

    function renderSvg() {
        var svg = $('#odontograma').svg('get').clear();
        var parentGroup = svg.group({
            transform: 'scale(1.5)'
        });

        var containerWidth = $('#odontograma').width();
        var containerHeight = $('#odontograma').height();
        var scale = Math.min(containerWidth / 400, containerHeight / 250);
        $(parentGroup).attr('transform', 'scale(' + scale + ')');

        vm.dientes().forEach(function(diente) {
            drawDiente(svg, parentGroup, ko.utils.unwrapObservable(diente));
        });

        addInteractivity();
    }

    function addInteractivity() {
        $('#odontograma').off('wheel').on('wheel', function(event) {
            event.preventDefault();
            var delta = event.originalEvent.deltaY;
            setZoom(delta > 0 ? currentZoom - zoomStep : currentZoom + zoomStep);
        });

        $('#odontograma').off('mousedown').on('mousedown', function(event) {
            isDragging = true;
            startX = event.clientX - translateX;
            startY = event.clientY - translateY;
        });

        $(document).off('mousemove').on('mousemove', function(event) {
            if (isDragging) {
                translateX = event.clientX - startX;
                translateY = event.clientY - startY;
                updateTransform();
            }
        });

        $(document).off('mouseup').on('mouseup', function() {
            isDragging = false;
        });
    }

    function DienteModel(id, x, y, condition) {
        var self = this;
        self.id = condition || id.toString();
        self.x = x;
        self.y = y;
    }

    function ViewModel() {
        var self = this;

        var itemElemenGigi = [];
        try {
            if (typeof itemGigi === 'string') {
                itemElemenGigi = JSON.parse(itemGigi);
            } else if (Array.isArray(itemGigi)) {
                itemElemenGigi = itemGigi;
            }
        } catch (e) {
            console.error("Error parsing itemGigi:", e);
        }

        var itemPemeriksaan = Array.isArray(itemPem) ? itemPem : (itemPem ? itemPem.split(",") : []);

        self.dientes = ko.observableArray([]);

        function addDiente(id, x, y) {
            var condition = "";
            var index = itemElemenGigi.findIndex(value => value == id);
            if (index !== -1) {
                condition = itemPemeriksaan[index];
            }
            self.dientes.push(new DienteModel(id, x, y, condition));
        }

        var toothPositions = [{
                start: 18,
                end: 11,
                x: 0,
                y: 0,
                increment: -1
            },
            {
                start: 21,
                end: 28,
                x: 210,
                y: 0,
                increment: 1
            },
            {
                start: 48,
                end: 41,
                x: 0,
                y: 120,
                increment: -1
            },
            {
                start: 31,
                end: 38,
                x: 210,
                y: 120,
                increment: 1
            },
            {
                start: 55,
                end: 51,
                x: 75,
                y: 40,
                increment: -1
            },
            {
                start: 61,
                end: 65,
                x: 210,
                y: 40,
                increment: 1
            },
            {
                start: 85,
                end: 81,
                x: 75,
                y: 80,
                increment: -1
            },
            {
                start: 71,
                end: 75,
                x: 210,
                y: 80,
                increment: 1
            }
        ];

        toothPositions.forEach(function(position) {
            for (var i = position.start; position.increment > 0 ? i <= position.end : i >= position
                .end; i += position.increment) {
                var x = position.x + (Math.abs(i - position.start) * 25);
                addDiente(i, x, position.y);
            }
        });
    }

    var vm = new ViewModel();

    $('#odontograma').svg({
        settings: {
            width: '100%',
            height: '100%'
        }
    });

    if (typeof ko !== 'undefined') {
        ko.applyBindings(vm);
    } else {
        console.error("Knockout.js is not loaded");
    }

    renderSvg();

    // Function to truncate text for display
    function truncateText(text, maxLength = 50) {
        if (!text || text.length <= maxLength) {
            return text || '-';
        }
        return text.substring(0, maxLength) + '...';
    }

    // Function to format catatan for display
    function formatCatatanForDisplay(perencanaan, tindakan, evaluasi, diagnosa) {
        return '<small class="d-block"><strong>P:</strong> ' + truncateText(perencanaan) + '</small>' +
               '<small class="d-block"><strong>T:</strong> ' + truncateText(tindakan) + '</small>' +
               '<small class="d-block"><strong>E:</strong> ' + truncateText(evaluasi) + '</small>' +
               '<small class="d-block"><strong>D:</strong> ' + truncateText(diagnosa) + '</small>';
    }

    window.addRekam = function() {
        var element_gigi = $("#element_gigi").val();
        var tindakan = $("#tindakan").val();
        var diagnosa = $("#diagnosa").val();
        var kondisi_gigi = $("#kondisi_gigi").val();
        
        // Get catatan values
        var catatan_perencanaan = $("#catatan_perencanaan").val();
        var catatan_tindakan = $("#catatan_tindakan").val();
        var catatan_evaluasi = $("#catatan_evaluasi").val();
        var catatan_diagnosa = $("#catatan_diagnosa").val();

        if (kondisi_gigi == "") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Kondisi gigi harus diisi!',
            });
            return;
        }

        // Check if tooth element already exists
        var isDuplicate = false;
        $("#table-tindakan tbody tr").each(function() {
            if ($(this).find('input[name="element_gigi[]"]').val() === element_gigi) {
                isDuplicate = true;
                return false;
            }
        });

        if (isDuplicate) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Elemen gigi ini sudah ada dalam daftar!',
            });
            return;
        }

        try {
            var catatanDisplay = formatCatatanForDisplay(catatan_perencanaan, catatan_tindakan, catatan_evaluasi, catatan_diagnosa);
            
            var rowData = [
                (element_gigi || '-') + '<input type="hidden" name="element_gigi[]" value="' + (element_gigi || '') + '" />',
                kondisi_gigi + '<input type="hidden" name="pemeriksaan[]" value="' + kondisi_gigi + '" />',
                (diagnosa || '-') + '<input type="hidden" name="diagnosa[]" value="' + (diagnosa || '') + '" />',
                (tindakan || '-') + '<input type="hidden" name="tindakan[]" value="' + (tindakan || '') + '" />',
                catatanDisplay +
                '<input type="hidden" name="catatan_perencanaan[]" value="' + (catatan_perencanaan || '') + '" />' +
                '<input type="hidden" name="catatan_tindakan[]" value="' + (catatan_tindakan || '') + '" />' +
                '<input type="hidden" name="catatan_evaluasi[]" value="' + (catatan_evaluasi || '') + '" />' +
                '<input type="hidden" name="catatan_diagnosa[]" value="' + (catatan_diagnosa || '') + '" />',
                '<button type="button" class="btn btn-warning btn-sm btnEdit"><i class="fa fa-edit"></i></button> ' +
                '<button type="button" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i></button>'
            ];

            // Add row to DataTable
            tableTindakan.row.add(rowData).draw();

            // Reset form fields after adding
            $("#element_gigi").val('');
            $("#kondisi_gigi").val('');
            $("#diagnosa").val('');
            $("#tindakan").val('');
            $("#catatan_perencanaan").val('');
            $("#catatan_tindakan").val('');
            $("#catatan_evaluasi").val('');
            $("#catatan_diagnosa").val('');

            // Update odontogram
            updateOdontogram();

            Swal.fire({
                type: 'success',
                title: 'Berhasil',
                text: 'Data berhasil ditambahkan',
                timer: 1500
            });

        } catch (error) {
            console.error("Error adding new record:", error);
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan saat menambahkan data. Silakan coba lagi.',
            });
        }
    };

    function updateOdontogram() {
        // Get data from DataTable instead of DOM
        var tableData = tableTindakan.rows().data();
        
        tableData.each(function(rowData, index) {
            // Extract element_gigi from the HTML string
            var elementGigiHtml = rowData[0];
            var elementGigiMatch = elementGigiHtml.match(/value="([^"]*)"/) || ['', ''];
            var element_gigi = elementGigiMatch[1];
            
            // Extract kondisi_gigi from the HTML string
            var kondisiGigiHtml = rowData[1];
            var kondisiGigiMatch = kondisiGigiHtml.match(/value="([^"]*)"/) || ['', ''];
            var kondisi_gigi = kondisiGigiMatch[1];

            var diente = ko.utils.arrayFirst(vm.dientes(), function(item) {
                return item.id == element_gigi;
            });

            if (diente) {
                diente.id = kondisi_gigi;
            }
        });

        renderSvg();
    }

    $('#zoomIn').click(function() {
        setZoom(currentZoom + zoomStep);
    });

    $('#zoomOut').click(function() {
        setZoom(currentZoom - zoomStep);
    });

    $('#resetZoom').click(function() {
        currentZoom = 1;
        translateX = 0;
        translateY = 0;
        updateTransform();
    });

    // ICD table initialization
    var table = $('#icd-table').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        paging: true,
        select: false,
        pageLength: 5,
        lengthChange: false,
        ajax: icdDataUrl,
        columns: [{
                data: 'action',
                name: 'action'
            },
            {
                data: 'code',
                name: 'code'
            },
            {
                data: 'name_id',
                name: 'name_id'
            }
        ]
    });

    // Event listener for ICD selection
    $(document).on("click", ".pilihIcd", function() {
        var diagnosa_id = $(this).data('id');
        $("#diagnosa").val(diagnosa_id);
        $("#addDiagnosa").modal('hide');
    });

    // Initialize DataTable for treatment history
    var tableTindakan = $('#table-tindakan').DataTable({
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        language: {
            "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "lengthMenu": "Tampilkan _MENU_ entri",
            "loadingRecords": "Sedang memuat...",
            "processing": "Sedang memproses...",
            "search": "Cari:",
            "zeroRecords": "Tidak ditemukan data yang sesuai",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });

    // Confirmation dialog for deletion
    $(".delete").click(function() {
        var id = $(this).attr('r-id');
        var name = $(this).attr('r-name');
        var link = $(this).attr('r-link');

        Swal.fire({
            title: 'Ingin Menghapus?',
            text: "Yakin ingin menghapus data : " + name + " ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;
            }
        });
    });

    // Form submission
    $('#rekamGigiForm').submit(function(e) {
        e.preventDefault();

        if (tableTindakan.rows().count() === 0) {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Tambahkan setidaknya satu tindakan sebelum menyimpan!',
            });
            return;
        }

        Swal.fire({
            title: 'Konfirmasi',
            text: "Apakah Anda yakin ingin menyimpan semua data?",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                // Create form data from DataTable
                var formData = new FormData();
                formData.append('_token', $('input[name="_token"]').val());
                
                var tableData = tableTindakan.rows().data();
                var elementGigi = [];
                var pemeriksaan = [];
                var diagnosa = [];
                var tindakan = [];
                var catatanPerencanaan = [];
                var catatanTindakan = [];
                var catatanEvaluasi = [];
                var catatanDiagnosa = [];
                
                tableData.each(function(rowData, index) {
                    // Extract values from HTML
                    var elementGigiMatch = rowData[0].match(/value="([^"]*)"/) || ['', ''];
                    elementGigi.push(elementGigiMatch[1]);
                    
                    var pemeriksaanMatch = rowData[1].match(/value="([^"]*)"/) || ['', ''];
                    pemeriksaan.push(pemeriksaanMatch[1]);
                    
                    var diagnosaMatch = rowData[2].match(/value="([^"]*)"/) || ['', ''];
                    diagnosa.push(diagnosaMatch[1]);
                    
                    var tindakanMatch = rowData[3].match(/value="([^"]*)"/) || ['', ''];
                    tindakan.push(tindakanMatch[1]);
                    
                    var catatanPerencanaanMatch = rowData[4].match(/name="catatan_perencanaan\[\]" value="([^"]*)"/) || ['', ''];
                    catatanPerencanaan.push(catatanPerencanaanMatch[1]);
                    
                    var catatanTindakanMatch = rowData[4].match(/name="catatan_tindakan\[\]" value="([^"]*)"/) || ['', ''];
                    catatanTindakan.push(catatanTindakanMatch[1]);
                    
                    var catatanEvaluasiMatch = rowData[4].match(/name="catatan_evaluasi\[\]" value="([^"]*)"/) || ['', ''];
                    catatanEvaluasi.push(catatanEvaluasiMatch[1]);
                    
                    var catatanDiagnosaMatch = rowData[4].match(/name="catatan_diagnosa\[\]" value="([^"]*)"/) || ['', ''];
                    catatanDiagnosa.push(catatanDiagnosaMatch[1]);
                });
                
                // Append arrays to FormData
                elementGigi.forEach((val, index) => formData.append('element_gigi[]', val));
                pemeriksaan.forEach((val, index) => formData.append('pemeriksaan[]', val));
                diagnosa.forEach((val, index) => formData.append('diagnosa[]', val));
                tindakan.forEach((val, index) => formData.append('tindakan[]', val));
                catatanPerencanaan.forEach((val, index) => formData.append('catatan_perencanaan[]', val));
                catatanTindakan.forEach((val, index) => formData.append('catatan_tindakan[]', val));
                catatanEvaluasi.forEach((val, index) => formData.append('catatan_evaluasi[]', val));
                catatanDiagnosa.forEach((val, index) => formData.append('catatan_diagnosa[]', val));

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        Swal.fire({
                            type: 'success',
                            title: 'Tersimpan!',
                            text: 'Data telah berhasil disimpan.',
                        }).then(() => {
                            window.location.href = opsiEdukasiUrl;
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat menyimpan data.',
                        });
                    }
                });
            }
        });
    });

    // Delete functionality with catatan handling
    $("#table-tindakan").on('click', '.btnDelete', function(e) {
        e.preventDefault();
        var row = tableTindakan.row($(this).closest('tr'));

        Swal.fire({
            title: 'Anda yakin?',
            text: "Data ini akan dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                row.remove().draw();
                updateOdontogram();
                Swal.fire('Terhapus!', 'Data telah dihapus.', 'success');
            }
        });
    });

    // Edit functionality with catatan handling
    $("#table-tindakan").on('click', '.btnEdit', function(e) {
        e.preventDefault();
        var row = tableTindakan.row($(this).closest('tr'));
        editRow(row);
    });

    function editRow(row) {
        var rowData = row.data();
        
        // Extract values from HTML strings
        var elementGigiMatch = rowData[0].match(/value="([^"]*)"/) || ['', ''];
        var elementGigi = elementGigiMatch[1];
        
        var pemeriksaanMatch = rowData[1].match(/value="([^"]*)"/) || ['', ''];
        var pemeriksaan = pemeriksaanMatch[1];
        
        var diagnosaMatch = rowData[2].match(/value="([^"]*)"/) || ['', ''];
        var diagnosa = diagnosaMatch[1];
        
        var tindakanMatch = rowData[3].match(/value="([^"]*)"/) || ['', ''];
        var tindakan = tindakanMatch[1];
        
        // Extract catatan values
        var catatanPerencanaanMatch = rowData[4].match(/name="catatan_perencanaan\[\]" value="([^"]*)"/) || ['', ''];
        var catatanPerencanaan = catatanPerencanaanMatch[1];
        
        var catatanTindakanMatch = rowData[4].match(/name="catatan_tindakan\[\]" value="([^"]*)"/) || ['', ''];
        var catatanTindakan = catatanTindakanMatch[1];
        
        var catatanEvaluasiMatch = rowData[4].match(/name="catatan_evaluasi\[\]" value="([^"]*)"/) || ['', ''];
        var catatanEvaluasi = catatanEvaluasiMatch[1];
        
        var catatanDiagnosaMatch = rowData[4].match(/name="catatan_diagnosa\[\]" value="([^"]*)"/) || ['', ''];
        var catatanDiagnosa = catatanDiagnosaMatch[1];

        // Fill form with existing data
        $("#element_gigi").val(elementGigi);
        $("#kondisi_gigi").val(pemeriksaan);
        $("#diagnosa").val(diagnosa);
        $("#tindakan").val(tindakan);
        $("#catatan_perencanaan").val(catatanPerencanaan);
        $("#catatan_tindakan").val(catatanTindakan);
        $("#catatan_evaluasi").val(catatanEvaluasi);
        $("#catatan_diagnosa").val(catatanDiagnosa);

        // Remove old row from DataTable
        row.remove().draw();

        // Update odontogram
        updateOdontogram();

        // Scroll to form
        $('html, body').animate({
            scrollTop: $("#rekamGigiForm").offset().top
        }, 500);
    }

    // Resize event listener
    $(window).resize(function() {
        renderSvg();
    });

    // Initial render
    renderSvg();
});