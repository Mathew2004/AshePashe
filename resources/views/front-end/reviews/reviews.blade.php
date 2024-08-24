  <!-- Review Css -->
  @include("front-end.components.review-css")

<div class="review-section">
    <div class="rating-section">
        <div class="user-rating">
            <div class="stars">
                <i>★</i><i>★</i><i>★</i><i>★</i><i style="color: #ddd;">★</i>
            </div>
            <div class="rating-text">
                @if ($review = App\Models\Review::where('user_id', Auth::id())->where('product_id', $offer_product->id)->first() )
                {{$review->review}}
                @else
               
                @endif
            </div>
            <button onclick="document.getElementById('add-review-modal').style.display='block'"
                class="update-review">
                @if (App\Models\Review::where('user_id', Auth::id())->where('product_id', $offer_product->id)->first() )
                    Update Review
                @else
                Add your review
                @endif
            </button>
        </div>

        <div class="overall-rating">
            <div>{{number_format($averageRating, 1)}}</div>
            <div class="star-rating">★★★★☆</div>
            <div class="rating-count">{{$reviews->count()}} Reviews</div>
        </div>

        <div class="rating-distribution">
            <div class="rating-bar">
                <div class="star-text">★★★★★</div>
                <!-- <div class="bar"><span style="width: 85%;"></span></div> -->
                <div class="count">{{App\Models\Review::where('product_id',$offer_product->id)->where('rating',5)->count()}}</div>
            </div>
            <div class="rating-bar">
                <div class="star-text">★★★★☆</div>
                <!-- <div class="bar"><span style="width: 5%;"></span></div> -->
                <div class="count">{{App\Models\Review::where('product_id',$offer_product->id)->where('rating',4)->count()}}</div>
            </div>
            <div class="rating-bar">
                <div class="star-text">★★★☆☆</div>
                <!-- <div class="bar"><span style="width: 5%;"></span></div> -->
                <div class="count">{{App\Models\Review::where('product_id',$offer_product->id)->where('rating',3)->count()}}</div>
            </div>
            <div class="rating-bar">
                <div class="star-text">★★☆☆☆</div>
                <!-- <div class="bar"><span style="width: 0%;"></span></div> -->
                <div class="count">{{App\Models\Review::where('product_id',$offer_product->id)->where('rating',2)->count()}}</div>
            </div>
            <div class="rating-bar">
                <div class="star-text">★☆☆☆☆</div>
                <!-- <div class="bar"><span style="width: 10%;"></span></div> -->
                <div class="count">{{App\Models\Review::where('product_id',$offer_product->id)->where('rating',1)->count()}}</div>
            </div>
        </div>
    </div>

    @foreach ($reviews as $review)

        <div class="review">
            <div class="review-header">
                <img src="{{App\Models\User::where('id', $review->user_id)->first()->image}}" alt="User Image">
                <div>
                    <div class="user-name">{{App\Models\User::where('id', $review->user_id)->first()->name}}
                    </div>
                    <div class="review-date">{{$review->created_at}}</div>
                </div>
                <div class="star-rating">
                    @for ($i = 1; $i <= $review->rating; $i++)
                        <ion-icon name="star"></ion-icon>
                    @endfor
                    @for ($r = $review->rating; $r < 5; $r++)
                        <ion-icon name="star-outline"></ion-icon>
                    @endfor


                </div>
            </div>
            <div class="review-content">
                {{$review->review}}
            </div>
            <div class="review-actions">
                <button>
                    <i>👍</i> Helpful (<span class="vote-count">0</span>)
                </button>
                <button>
                    <i>👎</i> Not Helpful
                </button>
            </div>
        </div>

    @endforeach
</div>


<!-- Review Modal -->

<div id="add-review-modal" class="store-modal" style="display:none">
    @include("front-end.components.add-review-modal") 
    <!-- <h1>Hello</h1> -->
</div>


<script>
    $(document).ready(function () {
        $(".star").click(function () {
            var rating = $(this).data("value");
            $("#review-value").val(rating);

            $(".star").each(function () {
                if ($(this).data("value") <= rating) {
                    $(this).attr("name", "star");
                } else {
                    $(this).attr("name", "star-outline");
                }
            });
        });


        $("#review-form").submit(function (e) {
            e.preventDefault(); // Prevent the form from submitting the traditional way

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                success: function (response) {

                    if (response.update) {
                        $('#add-review-modal').attr('style', 'display:none');
                        alert("Review Updated")
                    }
                    else {

                        // Optionally, clear the form or update the page with the new review
                        // Construct the new review element
                        var newReview = `
                         <div class="review">
                            <div class="review-header">
                                <img src="${response.review.user_img}" alt="User Image">
                                <div>
                                    <div class="user-name">${response.review.user_name}</div>
                                    <div class="review-date">${new Date(response.review.created_at).toLocaleDateString()}</div>
                                </div>
                                <div class="star-rating">
                                    ${generateStars(response.review.rating)}
                                </div>
                            </div>
                            <div class="review-content">
                                ${response.review.review}
                            </div>
                            <div class="review-actions">
                                <button>
                                    <i>👍</i> Helpful (<span class="vote-count">0</span>)
                                </button>
                                <button>
                                    <i>👎</i> Not Helpful
                                </button>
                            </div>
                        </div>
                    `;
                        // alert(newReview);
                        // Append the new review to the list of reviews
                        $(".review-section").append(newReview);
                        $('#add-review-modal').attr('style', 'display:none');
                        // alert(response.message);

                        // Optionally, clear the form
                        // $('#review-form')[0].reset();
                        // $("#review-value").val(0);
                        
                        // $(".star").attr("name", "star-outline");
                        $(".rating-text").text(response.review.review);
                        $(".update-review").text("Update Review");
                    }
                },
                error: function (response) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
        function generateStars(rating) {
            var starsHtml = '';
            for (var i = 1; i <= 5; i++) {
                if (i <= rating) {
                    starsHtml += '<ion-icon name="star"></ion-icon>';
                } else {
                    starsHtml += '<ion-icon name="star-outline"></ion-icon>';
                }
            }
            return starsHtml;
        }
    });


</script>
