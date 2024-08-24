
<div class="modal" >

<div class="modal-close-overlay" data-modal-overlay></div>

<div class="modal-content">

  <button class="modal-close-btn" data-modal-close>
    <ion-icon name="close-outline"></ion-icon>
  </button>

  <!-- <div class="newsletter-img">
    <img src="/front-end-assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
    Create a Store
</div> -->

  <div class="newsletter">

    <form action="{{route('create.store')}}" method="POST" > @csrf

      <div class="newsletter-header">

        <h3 class="newsletter-title">Create New Store</h3>

        <!-- <p class="newsletter-desc">
          Subscribe the <b>Anon</b> to get latest products and discount update.
        </p> -->

      </div>

      <input type="hidden" name="user_id" class="email-field" value="{{Auth::id()}}">
      <input type="text" name="name" class="email-field" placeholder="Store Name" required>

      <button type="submit" class="btn-newsletter">Create</button>

    </form>

  </div>

</div>

</div>