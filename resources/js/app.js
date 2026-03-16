import './bootstrap';

console.log(flasher_msg);

if (flasher_msg) {
    flasher_msg.style.right = "5%"
    setTimeout(() => {
        flasher_msg.style.right = "-100%"
    }, 2500);
    setTimeout(() => {

        flasher_msg.remove()
    }, 3000);
}

