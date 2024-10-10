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

    window.addRekam = function() {
        var element_gigi = $("#element_gigi").val();
        var tindakan = $("#tindakan").val();
        var diagnosa = $("#diagnosa").val();
        var kondisi_gigi = $("#kondisi_gigi").val();

        if (kondisi_gigi == "") {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Kondisi gigi harus diisi!',
            });
            return;
        }

        // Cek apakah elemen gigi sudah ada
        var isDuplicate = false;
        $("#table-tindakan tbody tr").each(function() {
            if ($(this).find('input[name="element_gigi[]"]').val() === element_gigi) {
                isDuplicate = true;
                return false; // keluar dari loop
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
            var markup = '<tr>' +
                '<td>' + (element_gigi || '-') + '<input type="hidden" name="element_gigi[]" value="' +
                (element_gigi || '') + '" /></td>' +
                '<td>' + kondisi_gigi + '<input type="hidden" name="pemeriksaan[]" value="' +
                kondisi_gigi + '" /></td>' +
                '<td>' + (diagnosa || '-') + '<input type="hidden" name="diagnosa[]" value="' + (
                    diagnosa || '') +
                '" /></td>' +
                '<td>' + (tindakan || '-') + '<input type="hidden" name="tindakan[]" value="' + (
                    tindakan || '') +
                '" /></td>' +
                '<td>' +
                '<button type="button" class="btn btn-warning btn-sm btnEdit"><i class="fa fa-edit"></i></button> ' +
                '<button type="button" class="btn btn-danger btn-sm btnDelete"><i class="fa fa-trash"></i></button>' +
                '</td>' +
                '</tr>';

            $("#table-tindakan tbody").append(markup);

            // Reset form fields after adding
            $("#element_gigi").val('');
            $("#kondisi_gigi").val('');
            $("#diagnosa").val('');
            $("#tindakan").val('');

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
        $("#table-tindakan tbody tr").each(function() {
            var element_gigi = $(this).find('input[name="element_gigi[]"]').val();
            var kondisi_gigi = $(this).find('input[name="pemeriksaan[]"]').val();

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
    $('#table-tindakan').DataTable({
        responsive: true,
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

        if ($("#table-tindakan tbody tr").length === 0) {
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
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
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

    // Call updateOdontogram when treatments are added or removed
    $('button[onclick="addRekam()"]').click(updateOdontogram);
    $("#table-tindakan").on('click', '.btnDelete', function(e) {
        e.preventDefault();
        var row = $(this).closest('tr');

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
                row.remove();
                updateOdontogram();
                Swal.fire('Terhapus!', 'Data telah dihapus.', 'success');
            }
        });
    });

    $("#table-tindakan").on('click', '.btnEdit', function(e) {
        e.preventDefault();
        var row = $(this).closest('tr');
        editRow(row);
    });

    function editRow(row) {
        var elementGigi = row.find('input[name="element_gigi[]"]').val();
        var pemeriksaan = row.find('input[name="pemeriksaan[]"]').val();
        var diagnosa = row.find('input[name="diagnosa[]"]').val();
        var tindakan = row.find('input[name="tindakan[]"]').val();

        $("#element_gigi").val(elementGigi);
        $("#kondisi_gigi").val(pemeriksaan);
        $("#diagnosa").val(diagnosa);
        $("#tindakan").val(tindakan);

        // Hapus baris lama
        row.remove();

        // Update odontogram
        updateOdontogram();
    }


    // Resize event listener
    $(window).resize(function() {
        renderSvg();
    });

    // Initial render
    renderSvg();
});
