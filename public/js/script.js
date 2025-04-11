// DOM Elements
const brandsGrid = document.getElementById('brandsGrid');
const brandsLoader = document.getElementById('brandsLoader');
const emptyState = document.getElementById('emptyState');

// API Configuration
const API_BASE_URL = 'http://127.0.0.1:8000/api';
const API_ENDPOINT = '/brands';

// Fetch and display brands on page load
document.addEventListener('DOMContentLoaded', () => {
  loadBrands();
});

async function loadBrands() {
  try {
    console.log(`${API_BASE_URL}${API_ENDPOINT}`);
    showBrandsLoader();
    const response = await fetch(`${API_BASE_URL}${API_ENDPOINT}`, {
      method: "GET",
    });
    const brands = await response.json();
    console.log(brands);

    renderBrands(brands);
  } catch (error) {
    console.error('Failed to fetch brands:', error);
    showEmptyState('Failed to load brands. Please try again.');
  } finally {
    hideBrandsLoader();
  }
}

function renderBrands(brands) {
  if (!brands.length) {
    showEmptyState('No brands available.');
    return;
  }

  emptyState.style.display = 'none';
  brandsGrid.innerHTML = brands.map(brand => createBrandCard(brand)).join('');
}

function createBrandCard(brand) {
  return `
    <div class="brand-card" id="brand-${brand.brand_id}">
      <img 
        src="${brand.brand_image}" 
        alt="${brand.brand_name}" 
        class="brand-image"
        onerror="this.src='https://via.placeholder.com/400x200?text=Image+Not+Found'"
      >
      <div class="brand-content">
        <h3 class="brand-title">${brand.brand_name}</h3>
        <div class="brand-rating">
          <span class="star">★</span> <span>${brand.rating.toFixed(1)}</span>
        </div>
        <p class="brand-description">${brand.brand_name || ''}</p>
      </div>
    </div>
  `;
}

function showBrandsLoader() {
  brandsLoader.style.display = 'block';
  brandsGrid.innerHTML = '';
  emptyState.style.display = 'none';
}

function hideBrandsLoader() {
  brandsLoader.style.display = 'none';
}

function showEmptyState(message) {
  brandsGrid.innerHTML = '';
  emptyState.textContent = message;
  emptyState.style.display = 'block';
}
