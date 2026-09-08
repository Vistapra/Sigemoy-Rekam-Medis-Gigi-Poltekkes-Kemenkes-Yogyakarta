document.addEventListener('DOMContentLoaded', () => {
    // 1. Preloader
    const preloader = document.getElementById('sgPreloader');
    if (preloader) {
        window.addEventListener('load', () => {
            setTimeout(() => {
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.style.display = 'none';
                    initAnimations();
                }, 500);
            }, 300);
        });
    } else {
        initAnimations();
    }

    // 2. Header Scroll Effect
    const header = document.querySelector('[data-sg-header]');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    });

    // 3. Mobile Menu Toggle
    const menuToggle = document.querySelector('.sg-menu-toggle');
    const mobileMenu = document.getElementById('sgMobileMenu');
    const mobileClose = document.querySelector('.sg-mobile__close');
    const mobileBackdrop = document.querySelector('.sg-mobile__backdrop');
    const mobileLinks = document.querySelectorAll('.sg-mobile__nav a');

    function openMobileMenu() {
        if (mobileMenu) {
            mobileMenu.classList.add('is-open');
            menuToggle.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeMobileMenu() {
        if (mobileMenu) {
            mobileMenu.classList.remove('is-open');
            menuToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    }

    if (menuToggle) menuToggle.addEventListener('click', openMobileMenu);
    if (mobileClose) mobileClose.addEventListener('click', closeMobileMenu);
    if (mobileBackdrop) mobileBackdrop.addEventListener('click', closeMobileMenu);
    mobileLinks.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // 4. Scroll To Top
    const scrollToTopBtn = document.getElementById('scrollToTop');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.classList.add('is-visible');
        } else {
            scrollToTopBtn.classList.remove('is-visible');
        }
    });
    if (scrollToTopBtn) {
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // 5. Smooth Scroll for Anchor Links
    document.querySelectorAll('a[data-sg-scroll]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId.startsWith('#')) {
                e.preventDefault();
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                } else if(window.location.pathname !== '/') {
                    window.location.href = '/' + targetId;
                }
            }
        });
    });

    // 6. Init GSAP & Animations
    function initAnimations() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            console.warn('GSAP or ScrollTrigger not loaded.');
            return;
        }

        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            console.log('Reduced motion enabled, skipping GSAP animations.');
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        // Splitting text for hero title
        const splitElements = document.querySelectorAll('[data-sg-split]');
        splitElements.forEach(el => {
            // Simple split text without extra library
            const text = el.innerText;
            const html = el.innerHTML;
            // Just doing a simple fade up on the whole element since full split requires SplitText plugin
            gsap.fromTo(el, 
                { y: 50, opacity: 0 },
                { y: 0, opacity: 1, duration: 1, ease: "power3.out" }
            );
        });

        // Reveal animations
        const revealElements = document.querySelectorAll('[data-sg-reveal]');
        revealElements.forEach(el => {
            const delay = parseFloat(el.getAttribute('data-sg-delay')) || 0;
            gsap.fromTo(el,
                { y: 30, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    delay: delay,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: el,
                        start: "top 85%",
                        toggleActions: "play none none none"
                    }
                }
            );
        });

        // Stagger list animations
        const staggerLists = document.querySelectorAll('[data-sg-stagger]');
        staggerLists.forEach(list => {
            const items = list.querySelectorAll('li, .sg-feature, .sg-service-card, .sg-toga-card, .sg-edu-card');
            gsap.fromTo(items,
                { y: 20, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.6,
                    stagger: 0.1,
                    ease: "power2.out",
                    scrollTrigger: {
                        trigger: list,
                        start: "top 80%",
                    }
                }
            );
        });

        // Number Counter Animation
        const countElements = document.querySelectorAll('[data-sg-count]');
        countElements.forEach(el => {
            const target = parseFloat(el.getAttribute('data-sg-count'));
            const suffix = el.getAttribute('data-sg-suffix') || '';
            const obj = { val: 0 };
            
            // Set initial state to 0 if JS runs, else it stays at the final value in HTML
            el.innerText = '0' + suffix;
            
            ScrollTrigger.create({
                trigger: el,
                start: "top 90%",
                once: true,
                onEnter: () => {
                    gsap.to(obj, {
                        val: target,
                        duration: 2,
                        ease: "power1.out",
                        onUpdate: () => {
                            el.innerText = Math.floor(obj.val) + suffix;
                        }
                    });
                }
            });
        });
    }

    // 7. Three.js Background Animation
    function initThreeJS() {
        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            console.log('Reduced motion enabled, skipping ThreeJS animation.');
            return;
        }

        const canvas = document.getElementById('sgHeroCanvas');
        if (!canvas || typeof THREE === 'undefined') return;

        const scene = new THREE.Scene();
        
        // Setup Camera
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 5;

        // Setup Renderer
        const renderer = new THREE.WebGLRenderer({ canvas: canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        // Create Particles
        const particlesGeometry = new THREE.BufferGeometry();
        const particlesCount = 300;
        
        const posArray = new Float32Array(particlesCount * 3);
        
        for(let i = 0; i < particlesCount * 3; i++) {
            // Distribute widely across screen
            posArray[i] = (Math.random() - 0.5) * 15;
        }
        
        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
        
        // Use primary color #0B7A79 for particles
        const material = new THREE.PointsMaterial({
            size: 0.05,
            color: 0x0B7A79,
            transparent: true,
            opacity: 0.6,
            blending: THREE.AdditiveBlending
        });
        
        const particlesMesh = new THREE.Points(particlesGeometry, material);
        scene.add(particlesMesh);

        // Handle Resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // Mouse interaction
        let mouseX = 0;
        let mouseY = 0;
        
        document.addEventListener('mousemove', (event) => {
            mouseX = (event.clientX / window.innerWidth) - 0.5;
            mouseY = (event.clientY / window.innerHeight) - 0.5;
        });

        // Animation Loop
        const clock = new THREE.Clock();

        function animate() {
            requestAnimationFrame(animate);
            const elapsedTime = clock.getElapsedTime();
            
            // Slow rotation
            particlesMesh.rotation.y = elapsedTime * 0.05;
            particlesMesh.rotation.x = elapsedTime * 0.02;
            
            // Mouse interaction
            particlesMesh.rotation.y += mouseX * 0.01;
            particlesMesh.rotation.x += mouseY * 0.01;
            
            renderer.render(scene, camera);
        }
        
        animate();
    }
    
    // Defer ThreeJS init to avoid blocking main thread
    setTimeout(initThreeJS, 1000);
});
