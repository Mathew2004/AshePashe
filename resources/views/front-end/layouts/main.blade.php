<!DOCTYPE html>
<html lang="en">

@include("front-end.layouts.head")


<body>


  <div class="overlay" data-overlay></div>

  <!--
    - MODAL
  -->
  <!-- 
  <div class="modal" data-modal>

    <div class="modal-close-overlay" data-modal-overlay></div>

    <div class="modal-content">

      <button class="modal-close-btn" data-modal-close>
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <div class="newsletter-img">
        <img src="/front-end-assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
      </div>

      <div class="newsletter">

        <form action="#">

          <div class="newsletter-header">

            <h3 class="newsletter-title">Subscribe Newsletter.</h3>

            <p class="newsletter-desc">
              Subscribe the <b>Anon</b> to get latest products and discount update.
            </p>

          </div>

          <input type="email" name="email" class="email-field" placeholder="Email Address" required>

          <button type="submit" class="btn-newsletter">Subscribe</button>

        </form>

      </div>

    </div>

  </div> -->





  <!--
    - NOTIFICATION TOAST
  -->

  <!-- <div class="notification-toast" data-toast>

    <button class="toast-close-btn" data-toast-close>
      <ion-icon name="close-outline"></ion-icon>
    </button>

    <div class="toast-banner">
      <img src="/front-end-assets/images/products/jewellery-1.jpg" alt="Rose Gold Earrings" width="80" height="70">
    </div>

    <div class="toast-detail">

      <p class="toast-message">
        Someone in new just bought
      </p>

      <p class="toast-title">
        Rose Gold Earrings
      </p>

      <p class="toast-meta">
        <time datetime="PT2M">2 Minutes</time> ago
      </p>

    </div>

  </div> -->





  <!--
    - HEADER
  -->

  @include("front-end.layouts.header")




  <!--
    - MAIN
  -->

  <main>

    @yield("main-section")

  </main>


<style>
  .offer-badge{
    background: var(--ocean-green);
    font-size: var(--fs-8);
    font-weight: var(--weight-500);
    color: var(--white);
    padding: 0 8px;
    border-radius: 10px;
  }
</style>


  @include("front-end.layouts.footer")


  @include("front-end.layouts.scripts")
  <script>

    const bookToggle = document.getElementById('book-toggle');
    const superstoreToggle = document.getElementById('superstore-toggle');
    const searchInput = document.getElementById('search');
    let search_type = 'foods';
    bookToggle.addEventListener('click', function () {
      search_type = 'foods';
      bookToggle.classList.add('active');
      superstoreToggle.classList.remove('active');
      searchInput.placeholder = 'Search by Foods';

    });

    superstoreToggle.addEventListener('click', function () {
      search_type = 'restaurants';
      superstoreToggle.classList.add('active');
      bookToggle.classList.remove('active');
      searchInput.placeholder = 'Search by Restaurants';
      

    });

    document.getElementById('search').addEventListener('keyup', function () {
      var query = this.value;


      if (query.length > 0) {
        fetch(`/search?query=${query}&type=${search_type}`)
          .then(response => response.json())
          .then(data => {
            var resultsContainer = document.getElementById('search-results');
            resultsContainer.innerHTML = '';
            // console.log(data);
             
            if (data.length > 0) {
              let allProductsHTML='';
              data.forEach(product => {
                var productHTML = `
                    <div class="result-item" id='result-item'>
                      <img src="/${search_type=='foods'?('uploads/products/'+product.image1):product.image}" alt="${product.name}" class="result-image">
                      <div class="result-info">
                        <h3 class="result-title">${product.name} <span class='offer-badge'>${product.offer?(product.offer.offer_percent?product.offer.offer_percent+"% off":product.offer.offer_buy):""}</span></h3>
                        <p class="result-author">${search_type=='foods'?product.company_id:product.division}</p>
                        <p class="result-price"><span class="old-price">${product.offer?product.price+"Tk.":""} </span> <span class="new-price">${search_type=='foods'?(product.offer?product.price-product.price*(product.offer.offer_percent/100)+"Tk":product.price +"TK."):product.city}</span></p>
                      </div>
                      <button class="add-button" id='view' onclick="visit('${product.slug}','${search_type}')">View</button>
                    </div>
                `;
          
                allProductsHTML += productHTML; 
             
              });
              resultsContainer.innerHTML = allProductsHTML;

           


            } else {
              resultsContainer.innerHTML = '<div class="suggestion">No results found</div>';
            }
          });
      } else {
        document.getElementById('search-results').innerHTML = '';
      }
    });

    document.getElementById('search-btn').addEventListener('click', function () {
      event.preventDefault();
      var query = document.getElementById('search').value;
      location.replace(`/search/${query}`);
    });

    function visit(slug,type) {
      if (type == 'foods') {
        location.replace(`/product/${slug}`);
      }else{
        location.replace(`/restaurant/${slug}`);
      }
    }

  </script>

  @yield("scripts")
  



</body>

</html>