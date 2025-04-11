document.addEventListener("DOMContentLoaded", () => {
    const countryCode = 'US'; // You can set this dynamically later
    fetch(`/api/brands`, {
        headers: {
            'Accept': 'application/json',
            'CF-IPCountry': countryCode // simulate country header
        }
    })
    .then(response => response.json())
    .then(brands => {
        const list = document.getElementById('brand-list');
        if (!brands.length) {
            list.innerHTML = '<p>No brands found for your region.</p>';
            return;
        }

        list.innerHTML = brands.map(brand => `
            <div class="brand">
                <img src="${brand.brand_image}" alt="${brand.brand_name}" class="brand-img" />
                <h3>${brand.brand_name}</h3>
                <p>Rating: ${brand.rating}</p>
            </div>
        `).join('');
    })
    .catch(error => {
        console.error("Error fetching brands:", error);
        document.getElementById('brand-list').innerHTML = '<p>Failed to load brands.</p>';
    });
});
