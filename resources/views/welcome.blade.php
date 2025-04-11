<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Brand Management - TopList</title>
        <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    

    
    </head>
   <body>
    <header class="header">
        <div class="container">
          <div class="header-content">
            <div class="logo">
              <h1>BrandRank</h1>
            </div>
            <nav class="desktop-nav">
              <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Casinos</a></li>
                <li><a href="#">Manage Brands</a></li>
              </ul>
            </nav>
            <button class="mobile-menu-btn" id="menuToggle">
              <i class="fas fa-bars"></i>
            </button>
          </div>
        </div>
      </header>
    
      <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
          <h2>Menu</h2>
          <button class="close-menu-btn" id="closeMenu">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Casinos</a></li>
            <li><a href="#">Manage Brands</a></li>
          </ul>
        </nav>
      </div>
    
    
      <main>
        <div class="container">
       
    
          <!-- Brands List -->
          <section class="brands-list-section">
            <div class="section-header">
              <h2>Brands List</h2>
            </div>
            
            <div id="brandsContainer">
              <div class="loader" id="brandsLoader">Loading brands...</div>
              <div class="empty-state" id="emptyState" style="display:none;">
                <p>No brands found. Add your first brand above.</p>
              </div>
              <div class="brands-grid" id="brandsGrid"></div>
            </div>
          </section>
        </div>
      </main>
    
      <footer>
        <div class="container">
          <div class="footer-content">
            <div class="copyright">
              &copy; 2025 BrandRank. All rights reserved.
            </div>
            <div class="footer-links">
              <a href="#">Privacy Policy</a>
              <a href="#">Terms of Service</a>
              <a href="#">Contact Us</a>
            </div>
          </div>
        </div>
      </footer>
    
      <!-- Toast Notification -->
      <div class="toast" id="toast">
        <div class="toast-content">
          <i class="fas fa-check-circle toast-icon toast-success"></i>
          <i class="fas fa-exclamation-circle toast-icon toast-error"></i>
          <div class="toast-message">This is a notification message</div>
        </div>
        <div class="toast-progress"></div>
      </div>
    
      <!-- Confirm Dialog -->
      <div class="modal" id="confirmModal">
        <div class="modal-content">
          <h3>Confirm Delete</h3>
          <p>Are you sure you want to delete this brand?</p>
          <div class="modal-actions">
            <button class="btn btn-outline" id="cancelDelete">Cancel</button>
            <button class="btn btn-danger" id="confirmDelete">Delete</button>
          </div>
        </div>
      </div>
    
      {{-- <script src="script.js"></script> --}}
      <script src="{{ asset('js/script.js') }}"></script>
   </body>
</html>
