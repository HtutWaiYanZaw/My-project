<div id="portfolio" class="container-fluid text-center bg-grey">
    <h2>Portfolio</h2>
    <h4>What we have created</h4>
    
    <div class="row my-5 slideAnimationObject">
        @foreach($portfolioImages as $pi)
            <div class="col-md-4">
                <img class="img-thumbnail mb-2" src="{{ asset('/storage/' . $pi->image) }}" alt="paris">
                <p>{{ $pi->image_label }}</p>
                <p>{{ $pi->image_description }}</p>
            </div>
        @endforeach        
        <div class="col-md-4">       
    </div>

    <h2>What our customers say</h2>
    <div id="my-carousel" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#my-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h4><i>"Could I... BE any more happy with this company?"</i><br>
                    Chandler Bing, Actor, FriendsAlot</h4>
            </div>
            <div class="carousel-item">
                <h4><i>"This company is the best. I am so happy with the result!"</i><br>
                    Michael Roe, Vice President, Comment Box</h4>
            </div>
            <div class="carousel-item">
                <h4><i>"One word... WOW!!"</i><br>
                    John Doe, Salesman, Rep Inc</h4>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#my-carousel" data-bs-slide="prev">
            <i class="fas fa-arrow-circle-left"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#my-carousel" data-bs-slide="next">
            <i class="fas fa-arrow-circle-right"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>