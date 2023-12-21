<div class="card p-3 mt-1 me-1" style="width: 23%;">
    <a href="{{ route('products.show', $product->id ?? 1) }}" class="a-card">
        <div class="card-body">
            <img src="{{ $product->img }}" class="card-img-top" alt="Missing image">
            <h4 class="card-title">{{ $product->title ?? 'No title provided' }}</h4>
            <h4 class="card-subtitle mb-2 text-body-secondary">{{ $product->price ?? 'No price provided' }}</h4>
            <p class="card-text">{{ $product->description ?? 'No description provided' }}</p>
        </div>
    </a>
</div>
