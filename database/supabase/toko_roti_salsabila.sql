create table if not exists public.products (
    id bigserial primary key,
    name varchar(255) not null,
    slug varchar(255) not null unique,
    category varchar(255) not null,
    description text not null,
    price numeric(12, 2) not null,
    weight varchar(50) not null,
    stock integer not null default 0 check (stock >= 0),
    is_featured boolean not null default false,
    image_url varchar(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);

create table if not exists public.transactions (
    id bigserial primary key,
    invoice_number varchar(255) not null unique,
    customer_name varchar(255) not null,
    customer_phone varchar(30) not null,
    customer_email varchar(255),
    delivery_method varchar(30) not null,
    address text not null,
    note text,
    subtotal numeric(12, 2) not null,
    shipping_cost numeric(12, 2) not null default 0,
    total_amount numeric(12, 2) not null,
    payment_method varchar(30) not null,
    payment_status varchar(30) not null default 'pending',
    order_status varchar(30) not null default 'baru',
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);

create table if not exists public.transaction_items (
    id bigserial primary key,
    transaction_id bigint not null references public.transactions(id) on delete cascade,
    product_id bigint not null references public.products(id) on delete restrict,
    product_name varchar(255) not null,
    product_price numeric(12, 2) not null,
    quantity integer not null check (quantity >= 0),
    line_total numeric(12, 2) not null,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);

insert into public.products
    (name, slug, category, description, price, weight, stock, is_featured, image_url, created_at, updated_at)
values
    (
        'Abon Gulung Solo',
        'abon-gulung-solo',
        'Kue Kering',
        'Roti gulung abon dengan rasa gurih manis, cocok untuk oleh-oleh keluarga dan tamu luar kota.',
        32000,
        '200 gram',
        28,
        true,
        '/images/products/abon-gulung-solo.svg',
        now(),
        now()
    ),
    (
        'Intip Mini Krispi',
        'intip-mini-krispi',
        'Snack Tradisional',
        'Intip khas Solo dengan tekstur renyah dan pilihan rasa original, balado, serta keju.',
        25000,
        '180 gram',
        35,
        true,
        '/images/products/intip-mini-krispi.svg',
        now(),
        now()
    ),
    (
        'Keripik Cakar Pedas',
        'keripik-cakar-pedas',
        'Keripik',
        'Camilan gurih pedas favorit anak muda, dikemas praktis untuk perjalanan jauh.',
        22000,
        '150 gram',
        42,
        false,
        '/images/products/keripik-cakar-pedas.svg',
        now(),
        now()
    ),
    (
        'Kue Semprong Wijen',
        'kue-semprong-wijen',
        'Kue Kering',
        'Kue semprong tipis dan harum wijen, cocok untuk hampers maupun suguhan keluarga.',
        30000,
        '250 gram',
        16,
        true,
        '/images/products/kue-semprong-wijen.svg',
        now(),
        now()
    )
on conflict (slug) do update set
    name = excluded.name,
    category = excluded.category,
    description = excluded.description,
    price = excluded.price,
    weight = excluded.weight,
    stock = excluded.stock,
    is_featured = excluded.is_featured,
    image_url = excluded.image_url,
    updated_at = now();
