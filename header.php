<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header
        x-data="{
            init() {
                $listen('wp-json/wc/store/', () => this.updateCartCount())
                $listen('wc-ajax', () => this.updateCartCount())
            },
            updateCartCount() {
                 htmx.ajax('GET', '<?= $_SERVER['REQUEST_URI'] ?>', {
                    target:'#cart-count',
                    select: '#cart-count',
                    swap:'outerHTML'
                })
           }
        }">
        <a href="/">Woo</a>
        <nav>
            <a href="/shop">Shop</a>
            <a href="/cart">Cart <span id="cart-count">(<?= WC()->cart->get_cart_contents_count() ?>)</span></a>
            <a href="/checkout">Checkout</a>
        </nav>
    </header>
    <div class="secondary-nav-wrapper">
        <nav>
            <a href="/shop/">All Products</a>
            <a href="/product-category/books/">Books</a>
            <a href="/product-category/clothing/">Clothing</a>
            <a href="/product-category/electronics/">Electronics</a>
            <a href="/product-category/music/">Music</a>
            <a href="/product-category/shoes/">Shoes</a>
        </nav>
    </div>
    <main>