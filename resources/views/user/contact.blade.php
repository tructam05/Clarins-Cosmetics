<x-layout>
  <!-- Title page -->
  <section class="bg-img1 txt-center p-lr-15 p-tb-92">
    <h2 class="ltext-201 cl2 txt-center">
      Contact Us
    </h2>
  </section>

  <!-- Content page -->
  <section class="bg0 p-t-104 p-b-116">
    <div class="container">
      <div class="flex-w flex-tr">
        <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
          <form>
            <h4 class="mtext-105 cl2 txt-center p-b-10">
              Can't find the answer to your question, the Clarins Customer Service is at your disposal:
            </h4>
            <h5 class="stext-106 txt-center p-b-30">Complete the form below and we will respond within 48 business hours</h5>

            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
              <img class="how-pos4 pointer-none" src="{{asset('user')}}/images/icons/icon-email.png" alt="ICON">
            </div>

            <div class="bor8 m-b-30">
              <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
            </div>

            <button class="flex-c-m stext-101 cl0 size-121 bg10 bor20 hov-btn2 p-lr-15 trans-04 pointer">
              Submit
            </button>
          </form>
        </div>

        <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
          <div class="flex-w w-full p-b-42">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-map-marker"></span>
            </span>

            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Address
              </span>

              <p class="stext-115 cl6 size-213 p-t-18">
                TREASURE ISLAND MALL, PLOT NO 11, M G ROAD,
                MG ROAD INDORE,
                INDORE MP 452001
              </p>
            </div>
          </div>

          <div class="flex-w w-full p-b-42">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-phone-handset"></span>
            </span>

            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Lets Talk
              </span>

              <p class="stext-115 cl1 size-213 p-t-18">
                73149 91708
              </p>
            </div>
          </div>

          <div class="flex-w w-full">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-envelope"></span>
            </span>

            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Sale Support
              </span>

              <p class="stext-115 cl1 size-213 p-t-18">
                enquiries.in@clarins.com
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Map -->
  <div class="map">
    <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
  </div>
</x-layout>