export interface Category {
    id: number;
    fieldname: string;
    created_at: string;
    updated_at: string;
}

export interface PaginationLink {
    url: string | null;
    label: string;
    active: boolean;
}

export interface Paginated<T> {
    data: T[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    from: number | null;
    to: number | null;
    links: PaginationLink[];
}

export interface Product {
    id: string;
    image: string;
    nama_produk: string;
    kategori_id: number;
    sku: string;
    type: string;
    variants: number;
    stok_produk: boolean;
    stok: number;
    harga_modal: number;
    harga_jual: number;
    harga_spesial: number | null;
    created_at: string;
    updated_at: string;
    category?: Category;
}


