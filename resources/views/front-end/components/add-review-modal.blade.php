<div class="modal">

    <div class="modal-close-overlay" onclick="document.getElementById('add-review-modal').style.display='none'"></div>

    <div class="modal-content">

        <button class="modal-close-btn" onclick="document.getElementById('add-review-modal').style.display='none'">
            <ion-icon name="close-outline"></ion-icon>
        </button>

        <!-- <div class="newsletter-img">
    <img src="/front-end-assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
    Create a Store
</div> -->
        @if (Auth::check())
            <div class="newsletter">

                <form id="review-form" action="{{ route('reviews.store') }}" method="POST"> @csrf

                    <div class="newsletter-header">

                        <h3 class="newsletter-title">Add Review to "{{$prod->name}}"</h3>

                        <div class="star-rating" style="display: flex; align-items: center;  color: #f39c12;
            margin-left: auto;
            font-size: 38px;
            display: flex;
            align-items: center;">
                            <ion-icon class="star" name="star-outline" data-value="1"></ion-icon>
                            <ion-icon class="star" name="star-outline" data-value="2"></ion-icon>
                            <ion-icon class="star" name="star-outline" data-value="3"></ion-icon>
                            <ion-icon class="star" name="star-outline" data-value="4"></ion-icon>
                            <ion-icon class="star" name="star-outline" data-value="5"></ion-icon>
                        </div>

                        <input type="hidden" id="review-value" name="rating" value="0">



                    </div>

                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="product_id" value="{{ $prod->id }}">
                    <textarea name="review" class="styled-textarea" placeholder="Write Review" required></textarea>

                    <button type="submit" class="btn-newsletter">Submit</button>

                </form>

            </div>
        @else
        <div class="newsletter">

                    <div class="newsletter-header">

                        <h3 class="newsletter-title">Please Login</h3>

                         <a href="{{url('/user/login')}}" class="btn-newsletter">Sign Up With Google</a>
                    </div>
               

            </div>

        @endif

    </div>

</div>