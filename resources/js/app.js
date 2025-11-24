import './bootstrap';
import TypeIt from 'typeit';
import AOS from 'aos';
import 'aos/dist/aos.css';

// Inisialisasi AOS
document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
        duration: 800,   // durasi animasi (ms)
        once: true,      // animasi hanya sekali
    });
});

new TypeIt("#typing", {
  strings: ["App Web untuk mengecek dan memberi tanda untuk pelanggaran siswa"],
  speed: 80,
  loop: true,
}).go();