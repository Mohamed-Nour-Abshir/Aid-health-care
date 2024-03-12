<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> Contact us
                </div>
            </div>
        </div>                
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">Drop Us a Line</h3>
                            <p class="text-muted mb-30 text-center font-sm" style="font-style: italic;">Lorem ipsum dolor sit amet consectetur.</p>
                            @if (Session::has('message'))
                                <div class="alert alert-success p-3" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <form class="contact-form-style text-center" id="contact-form" wire:submit.prevent="sendMessage">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input placeholder="Full Name" type="text" wire:model="name">
                                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input placeholder="Your Email" type="email" wire:model="email">
                                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="input-style mb-20">
                                            <input placeholder="Your Phone" type="tel" wire:model="phone">
                                            @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12">
                                        <div class="textarea-style mb-30">
                                            <textarea placeholder="Message" wire:model="comment"></textarea>
                                            @error('comment') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">Send message</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="order_review">
                            
                            <iframe src="@if ($settings){{$settings->map}} @else https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7303.17235780799!2d90.4327945!3d23.762131999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b80a03c8e22f%3A0xd52685f4a2fe003c!2sBanasree%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1653212913357!5m2!1sen!2sbd @endif" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <div class="mt-20">
                                <h3 style="font-style: italic;">Contact Details</h3>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Email:</td>
                                        <td>
                                            @if ($settings)
                                                {{$settings->email}}
                                            @else
                                                mdnourabshir@gmail.com
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>
                                            @if ($settings)
                                                {{$settings->phone}} - {{$settings->phone2}}
                                            @else
                                                01730931984 - 01730931985
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>
                                            @if ($settings)
                                                {{$settings->address}}
                                            @else
                                                Rampura,Bonsree
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>
{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.50707673964!2d90.42628521411216!3d23.76495098458223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c78a4f1fe899%3A0x50df1cc3411df811!2sB%20Block%2C%20Main%20Rd%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1650385490570!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
