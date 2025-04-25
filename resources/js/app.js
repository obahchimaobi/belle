import './bootstrap';

// other app stuff...
document.addEventListener("livewire:navigating", () => {
    HSStaticMethods.autoInit();
});

document.addEventListener("livewire:navigated", () => {
    HSStaticMethods.autoInit();
});
