document.addEventListener("alpine:init", () => {
    Alpine.data("products", () => {
        items: [
            { id: 1, name: "Robusta", price: 170000 },
            { id: 2, name: "Arabica", price: 110000 },
        ];
    });
});
