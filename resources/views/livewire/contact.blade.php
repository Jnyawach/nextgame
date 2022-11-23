<div>
    <section class="pt-5 contact">
        <div class="row">
            <div class="col-12 col-md-8 p-3 p-lg-5 mx-auto">

                <h6>Send Us a Message</h6>
                <form class="mt-5" wire:submit.prevent="createMessage">
                    @honeypot
                    <div class="form-group required m-2">
                        <label class="control-label" for="userName">
                            Your Name:
                        </label>
                        <input type="text" id="userName" name="userName" class="form-control mt-2"
                               wire:model="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror<br>
                        <small>Please enter your first and last name</small>
                    </div>
                    <div class="form-group required m-2 mt-4">
                        <label class="control-label" for="userEmail">
                            Your Email:
                        </label>
                        <input type="text" id="userEmail" name="userEmail" class="form-control mt-2"
                               wire:model="email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group required m-2 mt-4">
                        <label class="control-label" for="subject">
                            Subject:
                        </label>
                        <input type="text" id="subject" name="subject" class="form-control mt-2"
                               wire:model="subject">
                        @error('subject') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group required m-2 mt-4">
                        <label class="control-label" for="message">
                            Your Message:
                        </label>
                        <textarea id="message" name="subject" class="form-control mt-2" rows="6" wire:model="message"></textarea>
                        @error('message') <span class="error">{{ $message }}</span> @enderror<br>


                    </div>
                    <div class="form-group required m-2 mt-4">
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                    @if($success)
                        <div class="alert alert-success mt-2">Thank you for contacting us. We have received your message</div>
                    @endif
                </form>
            </div>
        </div>
    </section>
</div>
