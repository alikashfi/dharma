<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url>
            <loc>{{ route('home') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>1</priority>
        </url>
        <url>
            <loc>{{ route('shop') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        @foreach ($categories as $category)
            <url>
                <loc>{{ route('category', $category->slug) }}</loc>
                <changefreq>monthly</changefreq>
                <priority>0.8</priority>
            </url>
        @endforeach
        @foreach ($products as $product)
            <url>
                <loc>{{ route('product', $product->slug) }}</loc>
                <changefreq>monthly</changefreq>
                <lastmod>{{ $product->updated_at->format('Y-m-d\TH:i:s+03:30') }}</lastmod>
                <priority>0.9</priority>
            </url>
        @endforeach
</urlset>
