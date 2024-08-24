<div class="modal">

    <button class="modal-close-overlay"
        onclick="document.getElementById('update-product-modal').style.display='none'"></button>

    <div class="modal-content">

        <button class="modal-close-btn" id="close"
            onclick="document.getElementById('update-product-modal').style.display='none'">
            <ion-icon name="close-outline"></ion-icon>
        </button>

        <!-- <div class="newsletter-img">
    <img src="/front-end-assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
    Create a Store
</div> -->

        <div class="newsletter" >

            <form action="{{route('update.seller.product',['slug'=> 's'])}}" method="post" enctype="multipart/form-data"> @csrf

                <div class="newsletter-header" >

                    <h3 class="newsletter-title">Add New Product</h3>

                    <!-- <p class="newsletter-desc">
          Subscribe the <b>Anon</b> to get latest products and discount update.
        </p> -->

                </div>

                <input type="text" id="addName" name="name" class="email-field" placeholder="Product Name" required>
                <textarea type="text" id="addDesc" name="description" class="email-field"  required>
                    Gluten-free, contains dairy.Price: $15.99
                </textarea>
                <input type="hidden" name="company_id" class="email-field" value="{{$store->name}}">
                <input type="number" id="price" name="price" class="email-field" placeholder="Price" required>
                <input type="file" name="image1" class="email-field" >
                
                <input type="file" name="image2" class="email-field">
                <input type="file" name="image3" class="email-field">

                <button type="submit" class="btn-newsletter">Add Product</button>

            </form>

        </div>

    </div>

</div>