<template>
    <div class="overflow-x-auto mx-[24px] rounded-md">
        <table class="overflow-x-scroll min-w-[900px] w-full text-sm">
            <thead class="text-black bg-[#e3e7f4]">
                <tr class="text-left">
                    <th class="px-4 py-3 font-medium">Nama Produk</th>
                    <th class="px-4 py-3 font-medium">Varian</th>
                    <th class="px-4 py-3 font-medium">Tipe Produk</th>
                    <th class="px-4 py-3 font-medium">Kategori</th>
                    <th class="px-4 py-3 font-medium">Harga Jual</th>
                    <th class="px-4 py-3 font-medium">Waktu Dibuat</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-2 py-3"></th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="(p, i) in props.products?.data"
                    :key="p.id"
                    class="bg-[#F6F8FC] border-neutral-200/80 hover:bg-neutral-50"
                >
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <img
                                :src="p.image"
                                alt=""
                                class="w-9 h-9 rounded-md object-cover"
                            />
                            <div class="leading-tight">
                                <div class="text-neutral-900 font-medium">
                                    {{ p.nama_produk }}
                                </div>
                                <div class="text-xs text-neutral-500">
                                    {{ p.sku }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-4 py-3 text-neutral-700">{{ p.variants }}</td>
                    <td class="px-4 py-3">
                        <span
                            class="inline-flex items-center h-6 px-2 rounded-full border border-neutral-200 text-neutral-700 bg-white"
                        >
                            {{ p.type }}
                        </span>
                    </td>

                    <td class="px-4 py-3">
                        <span
                            class="inline-flex items-center h-6 px-2 rounded-full bg-neutral-100 text-neutral-700 border border-neutral-200"
                        >
                            {{ p.category?.fieldname }}
                        </span>
                    </td>

                    <td class="px-4 py-3 text-neutral-900">
                        Rp {{ formatIDR(p.harga_modal) }} - Rp
                        {{ formatIDR(p.harga_jual) }}
                    </td>

                    <td class="px-4 py-3 text-neutral-700">
                        {{ new Date(p.created_at).toISOString().slice(0, 10) }}
                    </td>

                    <td class="px-4 py-3">
                        <label
                            class="inline-flex items-center cursor-pointer select-none"
                        >
                            <input
                                type="checkbox"
                                class="hidden"
                                :checked="p.stok_produk"
                                @change="toggleStock(p.id, !p.stok_produk)"
                            />
                            <span
                                class="relative w-10 h-5 inline-flex items-center rounded-full transition"
                                :class="
                                    p.stok_produk
                                        ? 'bg-blue-600'
                                        : 'bg-neutral-300'
                                "
                            >
                                <span
                                    class="absolute left-0.5 top-0.5 w-4 h-4 rounded-full bg-white shadow transition-transform"
                                    :style="{
                                        transform: p.stok_produk
                                            ? 'translateX(20px)'
                                            : 'translateX(0px)',
                                    }"
                                />
                            </span>
                        </label>
                    </td>

                    <td class="px-2 py-3 text-right relative">
                        <button
                            type="button"
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full hover:bg-neutral-200/50"
                            @click="toggleMenu(i)"
                        >
                            <svg
                                viewBox="0 0 24 24"
                                class="w-5 h-5"
                                fill="currentColor"
                            >
                                <circle cx="12" cy="5" r="1.8" />
                                <circle cx="12" cy="12" r="1.8" />
                                <circle cx="12" cy="19" r="1.8" />
                            </svg>
                        </button>

                        <div
                            v-if="openMenu === i"
                            class="fixed right-2 z-10 mt-2 w-40 bg-white border border-neutral-200 rounded-lg shadow-lg overflow-hidden"
                        >
                            <button
                                type="button"
                                class="w-full flex items-center gap-2 px-3 py-2 hover:bg-neutral-50 text-left"
                                @click="setShowDeleteModal(p.id)"
                            >
                                <svg
                                    viewBox="0 0 24 24"
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-1-3H10a2 2 0 00-2 2v1h8V6a2 2 0 00-2-2z"
                                    />
                                </svg>
                                Hapus Produk
                            </button>
                            <button
                                type="button"
                                class="w-full flex items-center gap-2 px-3 py-2 hover:bg-neutral-50 text-left"
                                @click="handleEdit(p)"
                            >
                                <svg
                                    viewBox="0 0 24 24"
                                    class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.232 5.232l3.536 3.536M4 20h4.586a1 1 0 00.707-.293l9.9-9.9a2 2 0 000-2.828l-1.372-1.372a2 2 0 00-2.828 0l-9.9 9.9A1 1 0 004 15.414V20z"
                                    />
                                </svg>
                                Edit Produk
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div
        class="px-4 py-3 border-neutral-200 flex items-center justify-end gap-2"
    >
        <button
            class="w-8 h-8 grid place-items-center rounded-md border border-neutral-200 hover:bg-neutral-50 disabled:opacity-40"
            :disabled="products.last_page === 1"
            @click="$emit('update:currentPage', products.current_page - 1)"
            aria-label="Prev"
        >
            ‹
        </button>

        <template v-for="n in products.last_page" :key="n">
            <button
                class="min-w-8 h-8 px-2 rounded-md border border-neutral-200 hover:bg-neutral-50"
                :class="products.current_page === n ? 'bg-neutral-100' : ''"
                @click="$emit('update:currentPage', n)"
            >
                {{ n }}
            </button>
        </template>

        <button
            class="w-8 h-8 grid place-items-center rounded-md border border-neutral-200 hover:bg-neutral-50 disabled:opacity-40"
            :disabled="products.current_page === products.last_page"
            @click="$emit('update:currentPage', products.current_page + 1)"
            aria-label="Next"
        >
            ›
        </button>
    </div>
    <ModalDelete v-model="showDeleteModal" :product-id="selectedProductId" />
</template>

<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from "vue";
import ModalDelete from "../modals/ModalDelete.vue";
import { router } from "@inertiajs/vue3";
import { Paginated, Product } from "../utils/types";

const showDeleteModal = ref(false);
const selectedProductId = ref<string | null>(null);

const defaultProducts: Paginated<Product> = {
    data: [],
    current_page: 1,
    last_page: 1,
    per_page: 5,
    total: 0,
    from: null,
    to: null,
    links: [],
};

const props = defineProps<{
    products?: Paginated<Product>;
    currentPage?: number;
}>();

const products = props.products ?? defaultProducts;

const toggleStock = (id: string, value: boolean) => {
    router.patch(`/product/${id}/stok`, {
        stok_produk: value,
    });
};

const setShowDeleteModal = (p: string) => {
    selectedProductId.value = p;
    showDeleteModal.value = true;
};

const emit = defineEmits<{
    (e: "update:currentPage", v: number): void;
    (e: "edit", p: Product): void;
}>();

const openMenu = ref<number | null>(null);
function toggleMenu(i: number) {
    openMenu.value = openMenu.value === i ? null : i;
}

function formatIDR(n: number) {
    return n.toLocaleString("id-ID");
}

function handleEdit(p: Product) {
    emit("edit", p);
    openMenu.value = null;
}

function onClickOutside(e: MouseEvent) {
    const target = e.target as HTMLElement;
    if (!target.closest("td")) openMenu.value = null;
}

onMounted(() => document.addEventListener("click", onClickOutside));
onBeforeUnmount(() => document.removeEventListener("click", onClickOutside));
</script>
