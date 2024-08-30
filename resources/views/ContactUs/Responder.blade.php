<div class="question-display">
    <div class="question-header">
        <h3>User Questions</h3>
    </div>


    <div class="question-content">
    @if (isset($contact))
        <p><strong>Full name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong>{{ $contact->email }}</p>
        <p><strong>Question:</strong></p>
        <p>{{ $contact->question }}</p>


        @else
        <p>No contact selected.</p>
    @endif
    </div>
    



    <div class="admin-response">
        <form action="#" method="post">
            @csrf
            <label for="response"><strong>Admin Response:</strong></label>
            <textarea id="response" name="response" class="form-control" rows="4" placeholder="Enter your feedback..."></textarea>
            <div class="response-actions">
                        <!-- nút gửi phản hồi -->
                <a href="">   
                     <button type="submit" class="btn-reply"> Submit Your Feedback </button>
                </a>


                        <!-- nút lưu trữ  -->
                <a href="">
                    <button type="button" class="btn-archive">Repository</button>
                </a>


                        <!-- nút xóa  -->
                <a href="">
                    <button type="button" class="btn-delete">Delete</button>
                </a>

                        <!-- nút back  -->
                <a href="{{url('clarins/contact')}}">
                    <button type="button" class="btn-delete">Back</button>
                </a>
            </div>
        </form>
    </div>
</div>



<link rel="stylesheet" href="{{asset('admin')}}/dist/css/style3.css">
<style></style>