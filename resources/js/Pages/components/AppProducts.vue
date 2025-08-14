<template>
    <section class="w-full bg-[#F6F8FC] max-h-[1581px] h-full">
        <div class="mb-3">
            <h1 class="text-lg font-semibold text-neutral-900">
                Daftar Produk
            </h1>
        </div>

        <div class="bg-white border-neutral-200 rounded-[8px] overflow-hidden">
            <div
                class="flex bg- items-center justify-between px-[24px] py-[24px] border-neutral-200"
            >
                <h2 class="text-base font-semibold text-neutral-900">Produk</h2>
                <AddProductButton :disabled="false" @click="createProduct" />
            </div>

            <ProductTable
                :products="props.products"
                v-model:current-page="currentPage"
                @edit="onEdit"
            />
        </div>
    </section>
</template>

<script setup lang="ts">
import { ref, watch } from "vue";
import ProductTable from "./ui/UiProductTable.vue";
import AddProductButton from "./ui/UiAddProductButton.vue";
import { router } from "@inertiajs/vue3";
import { Category, Paginated, Product } from "./utils/types";

const props = defineProps<{
    products?: Paginated<Product>;
    categories?: Category[];
}>();

const currentPage = ref<number>(props.products?.current_page ?? 1);

watch(currentPage, (page) => {
    router.get(`/?page=${page}`);
});

const emit = defineEmits<{
    (e: "update:modelValue", payload: boolean): void;
}>();

const createProduct = () => {
    emit("update:modelValue", true);
}

const onEdit = (_: Product): void => {
    alert(`Edit feature is not available`);
}
</script>
