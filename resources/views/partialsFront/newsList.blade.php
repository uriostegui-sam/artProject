<x-public-view>
  <section class="actualites">
    <h1>{{ __('news') }}</h1>

    <div class="actualites-btn" id="btn-news">
      <a id="all" class="btn-act active" onclick="selectBtnAct('all')">{{ __('All the events and exhibitions') }}</a>
      <a id="latest" class="btn-act" onclick="selectBtnAct('latest')">{{ __('Latest news') }}</a>
      <a id="expo" class="btn-act" onclick="selectBtnAct('expo')">{{ __('Expo events') }}</a>
      <a id="artwork" class="btn-act" onclick="selectBtnAct('inProgress')">{{ __('Artwork in progress') }}</a>
    </div>
    <div class="actualites-container all show">
      @foreach ($actualites as $actualite)
      <div class="actualites-container-topic card">
        <div>
          <img src="https://picsum.photos/600" alt="">
          <div class="cross">
            <a href="{{ route('actualites.show', $actualite) }}"> <span></span> <span></span></a>
          </div>
        </div>
        <p>{{ $actualite->created_at->format('d M Y') }}</p>
        <h3>{{ $actualite->titre }}</h3>
        <p class="body-text">{{ Str::limit($actualite->description, 200) }}</p>
      </div>
      @endforeach
    </div>

    <div class="actualites-container latest">
      @foreach ($lastestActualites as $actualite)
      <div class="actualites-container-topic card">
        <div>
          <img src="https://picsum.photos/600" alt="">
          <div class="cross">
            <a href="{{ route('actualites.show', $actualite) }}"> <span></span> <span></span></a>
          </div>
        </div>
        <p>{{ $actualite->created_at->format('d M Y') }}</p>
        <h3>{{ $actualite->titre }}</h3>
        <p class="body-text">{{ Str::limit($actualite->description, 200) }}</p>
      </div>
      @endforeach
    </div>

    <div class="actualites-container expo">

    </div>

    <div class="actualites-container inProgress">

    </div>
  </section>
</x-public-view>