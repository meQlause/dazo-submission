<template>
    <section class="w-full">
        <nav class="text-sm text-neutral-500 mb-3">
            <ol class="flex items-center gap-2">
                <li><a href="#" class="hover:underline">Daftar Produk</a></li>
                <li>›</li>
                <li class="text-neutral-700 font-medium">Tambah Produk</li>
            </ol>
        </nav>

        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold text-neutral-900">
                Tambah Produk
            </h1>
            <div class="flex items-center gap-4">
                <button
                    type="button"
                    class="h-9 px-3 rounded-lg pointer-cursor border border-neutral-200 text-neutral-700 bg-white hover:bg-neutral-50"
                    @click="createProducts"
                >
                    Kembali
                </button>
                <AddProductButton :disabled="!isFilled" @click="submit" />
            </div>
        </div>
        <div class="max-h-[550px] overflow-y-scroll pb-[20px]">
            <div
                class="bg-white border border-neutral-200 rounded-l-xl overflow-hidden mb-6"
            >
                <div class="px-4 py-3 border-b border-neutral-200">
                    <h2 class="text-base font-semibold text-neutral-900">
                        Informasi Produk
                    </h2>
                </div>

                <div class="p-4 space-y-4">
                    <InputField
                        label="Nama Produk"
                        v-model.trim="form.name"
                        name="name"
                        type="text"
                        placeholder="Masukkan nama produk"
                    />

                    <InputField
                        label="Kategori"
                        v-model.trim="form.category"
                        name="name"
                        type="text"
                        placeholder="Cari Kategori"
                    >
                        <template #searchStyle>
                            <span
                                class="absolute left-3 top-1/2 -translate-y-1/2"
                            >
                                <svg
                                    viewBox="0 0 24 24"
                                    class="w-4 h-4 text-neutral-500"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <circle cx="11" cy="11" r="7"></circle>
                                    <path
                                        d="M20 20l-3-3"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </span>
                        </template>
                    </InputField>

                    <InputField
                        label="SKU"
                        v-model.trim="form.sku"
                        name="name"
                        type="text"
                        placeholder="Masukkan SKU"
                    >
                        <template #info>
                            <p class="text-xs text-neutral-500">
                                Maksimal 100 karakter
                            </p>
                        </template>
                    </InputField>

                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-neutral-800 mb-1"
                                >Stok Produk</label
                            >
                            <p class="text-sm text-neutral-600">
                                Tampilkan produk ditampilkan di toko dan toko
                                digital. Nonaktifkan untuk menyembunyikan produk
                                dari pembeli.
                            </p>
                        </div>
                        <label
                            class="inline-flex items-center cursor-pointer select-none mt-1"
                        >
                            <input
                                type="checkbox"
                                class="hidden"
                                v-model="form.showStock"
                            />
                            <span
                                class="relative w-10 h-5 inline-flex items-center rounded-full transition"
                                :class="
                                    form.showStock
                                        ? 'bg-blue-600'
                                        : 'bg-neutral-300'
                                "
                            >
                                <span
                                    class="absolute left-0.5 top-0.5 w-4 h-4 rounded-full bg-white shadow transition-transform"
                                    :style="{
                                        transform: form.showStock
                                            ? 'translateX(20px)'
                                            : 'translateX(0px)',
                                    }"
                                />
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <div
                class="bg-white border border-neutral-200 rounded-l-lg overflow-hidden"
            >
                <div class="px-4 py-3 border-b border-neutral-200">
                    <h2 class="text-base font-semibold text-neutral-900">
                        Harga, Variasi, & Stok Ketersediaan
                    </h2>
                </div>

                <div class="p-4">
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-3"
                    >
                        <div>
                            <InputField
                                label="Stock"
                                v-model.trim="form.stock"
                                name="stock"
                                type="numeric"
                                placeholder="Masukan stock"
                            />
                        </div>

                        <div>
                            <InputField
                                label="Harga Modal"
                                v-model.trim="form.costPrice"
                                name="stock"
                                type="numeric"
                                placeholder="Masukan Harga Modal"
                            />
                        </div>

                        <div>
                            <InputField
                                label="Harga Jual"
                                v-model.trim="form.salePrice"
                                name="stock"
                                type="numeric"
                                placeholder="Masukan Jual"
                            />
                        </div>

                        <div>
                            <InputField
                                label="Harga Spesial"
                                v-model.trim="form.specialPrice"
                                name="stock"
                                type="numeric"
                                placeholder="Masukan HargaSpesial"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { reactive, computed, ref, watch } from "vue";
import AddProductButton from "./ui/UiAddProductButton.vue";
import InputField from "./ui/UiInputField.vue";
import { router } from "@inertiajs/vue3";

const isFilled = ref<boolean>(false);

const emit = defineEmits<{
    (e: "update:modelValue", payload: boolean): void;
}>();

const createProducts = () => {
    emit("update:modelValue", false);
};


const form = reactive({
    name: "",
    category: "",
    sku: "",
    showStock: true,

    stock: undefined as number | undefined,
    costPrice: undefined as number | undefined,
    salePrice: undefined as number | undefined,
    specialPrice: undefined as number | undefined,
});

const setIsFilled = () => {
    isFilled.value = !!(
        form.name &&
        form.category &&
        form.sku &&
        form.stock &&
        form.costPrice &&
        form.salePrice
    );
};

watch(form, setIsFilled, { deep: true, immediate: true });

const isValid = computed(() => {
    return (
        form.name.trim().length > 0 &&
        form.category.trim().length > 0 &&
        form.sku.trim().length > 0 &&
        typeof form.stock === "number" &&
        typeof form.costPrice === "number" &&
        typeof form.salePrice === "number"
    );
});

function submit() {
    if (isValid) {
        const payload = {
            nama_produk: form.name,
            kategori_id: form.category,
            sku: form.sku,
            stok: form.stock,
            stok_produk: form.showStock,
            harga_modal: form.costPrice,
            harga_jual: form.salePrice,
            harga_spesial: form.specialPrice,
        };

        router.post("/product/create", payload);
    } else alert("Input Tidak Valid");
}
</script>
