(function () {
    document.addEventListener('DOMContentLoaded', function () {
        var wrap = document.getElementById('obbsCoverflow');
        if (!wrap) return;

        var track = document.getElementById('coverflowTrack');
        var slides = Array.prototype.slice.call(track.querySelectorAll('.coverflow-slide'));
        var dotsWrap = document.getElementById('coverflowDots');
        var total = slides.length;
        var active = 0;
        var autoplayDelay = 4500;
        var autoplayTimer = null;

        // build dots
        slides.forEach(function (slide, i) {
            var dot = document.createElement('span');
            if (i === 0) dot.className = 'active';
            dot.addEventListener('click', function () {
                goTo(i);
                restartAutoplay();
            });
            dotsWrap.appendChild(dot);
        });
        var dots = Array.prototype.slice.call(dotsWrap.children);

        function shortestDiff(index, activeIndex, count) {
            var diff = index - activeIndex;
            if (diff > count / 2) diff -= count;
            if (diff < -count / 2) diff += count;
            return diff;
        }

        function render() {
            slides.forEach(function (slide, i) {
                var diff = shortestDiff(i, active, total);
                slide.className = 'coverflow-slide'; // reset
                if (diff === 0) {
                    slide.classList.add('cf-pos-0');
                } else if (diff === 1) {
                    slide.classList.add('cf-pos-1');
                } else if (diff === -1) {
                    slide.classList.add('cf-pos--1');
                } else if (diff === 2) {
                    slide.classList.add('cf-pos-2');
                } else if (diff === -2) {
                    slide.classList.add('cf-pos--2');
                } else if (diff > 2) {
                    slide.classList.add('cf-pos-hidden-right');
                } else {
                    slide.classList.add('cf-pos-hidden-left');
                }
            });
            dots.forEach(function (dot, i) {
                dot.classList.toggle('active', i === active);
            });
        }

        function goTo(index) {
            active = ((index % total) + total) % total;
            render();
        }

        function next() { goTo(active + 1); }
        function prev() { goTo(active - 1); }

        wrap.querySelector('.coverflow-next').addEventListener('click', function () {
            next();
            restartAutoplay();
        });
        wrap.querySelector('.coverflow-prev').addEventListener('click', function () {
            prev();
            restartAutoplay();
        });

        // clicking a side slide brings it to the center; clicking the
        // centered slide lets the lightbox link underneath open as normal
        slides.forEach(function (slide, i) {
            slide.addEventListener('click', function (e) {
                var diff = shortestDiff(i, active, total);
                if (diff !== 0) {
                    e.preventDefault();
                    goTo(i);
                    restartAutoplay();
                }
            });
        });

        // swipe / drag support
        var startX = 0, isDragging = false, dragThreshold = 40;

        function dragStart(x) {
            startX = x;
            isDragging = true;
        }
        function dragEnd(x) {
            if (!isDragging) return;
            isDragging = false;
            var delta = x - startX;
            if (delta > dragThreshold) {
                prev();
                restartAutoplay();
            } else if (delta < -dragThreshold) {
                next();
                restartAutoplay();
            }
        }

        wrap.addEventListener('touchstart', function (e) {
            dragStart(e.touches[0].clientX);
        }, { passive: true });
        wrap.addEventListener('touchend', function (e) {
            dragEnd(e.changedTouches[0].clientX);
        });

        wrap.addEventListener('mousedown', function (e) {
            dragStart(e.clientX);
            e.preventDefault();
        });
        window.addEventListener('mouseup', function (e) {
            dragEnd(e.clientX);
        });

        // keyboard support
        wrap.setAttribute('tabindex', '0');
        wrap.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowLeft') { prev(); restartAutoplay(); }
            if (e.key === 'ArrowRight') { next(); restartAutoplay(); }
        });

        function restartAutoplay() {
            if (autoplayTimer) clearInterval(autoplayTimer);
            autoplayTimer = setInterval(next, autoplayDelay);
        }

        render();
        restartAutoplay();

        // pause autoplay while the user is interacting with this section
        wrap.addEventListener('mouseenter', function () {
            if (autoplayTimer) clearInterval(autoplayTimer);
        });
        wrap.addEventListener('mouseleave', restartAutoplay);
    });
})();
