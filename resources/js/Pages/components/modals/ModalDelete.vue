<template>
    <transition name="fade">
        <div
            v-if="modelValue"
            class="fixed inset-0 z-40 bg-black/60"
            @click.self="close()"
        />
    </transition>

    <transition name="pop">
        <div
            v-if="modelValue"
            class="fixed inset-0 z-50 grid place-items-center p-4"
            role="dialog"
            aria-modal="true"
            :aria-labelledby="titleId"
            :aria-describedby="descId"
            @keydown.esc="close()"
        >
            <div
                ref="panelRef"
                class="w-full max-w-[730px] h-full max-h-[180px] rounded-2xl bg-white shadow-xl border border-black/5 overflow-hidden"
            >
                <div class="flex relative z-20">
                    <div class="flex-1 p-6">
                        <div class="flex items-start justify-between">
                            <h3
                                :id="titleId"
                                class="text-[18px] font-semibold text-[#1D2B5E]"
                            >
                                Yakin ingin menghapus produk ?
                            </h3>

                            <button
                                class="ml-3 inline-flex h-8 w-8 items-center justify-center rounded-md border border-neutral-200 hover:bg-neutral-50"
                                @click="close()"
                                aria-label="Tutup"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M18 6 6 18M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <p :id="descId" class="mt-1 text-sm text-neutral-600">
                            Setelah dihapus, produk ini tidak bisa dikembalikan.
                            Pastikan kamu yakin sebelum melanjutkan.
                        </p>

                        <div class="mt-6 flex justify-end items-center gap-3">
                            <button
                                type="button"
                                class="h-10 rounded-md px-4 text-sm font-medium border border-neutral-200 hover:bg-neutral-50"
                                @click="close()"
                            >
                                Batal
                            </button>
                            <button
                                type="button"
                                class="h-10 rounded-md px-5 text-sm font-semibold text-white bg-[#1E40AF] hover:brightness-95"
                                @click="onConfirm"
                            >
                                Hapus
                            </button>
                        </div>
                    </div>

                    <div
                        class="absolute ml-auto inset-0 -z-10 flex w-[400px] h-[180px] items-center justify-end pr-[70px] bg-gradient-to-l from-[#E7EDFF] to-[#fff]"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-16 w-16 opacity-70"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="#1E40AF"
                            stroke-width="1.2"
                        >
                            <path d="M3 6h18" />
                            <path
                                d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"
                            />
                            <path d="M10 11v6" />
                            <path d="M14 11v6" />
                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import { router } from "@inertiajs/vue3";

const panelRef = ref<HTMLDivElement | null>(null);

const props = defineProps<{
    productId: string | null;
    modelValue: boolean;
}>();

const emit = defineEmits<{
    (e: "update:modelValue", v: boolean): void;
}>();

const titleId = `dlg-title-${Math.random().toString(36).slice(2)}`;
const descId = `dlg-desc-${Math.random().toString(36).slice(2)}`;

const close = () => {
    emit("update:modelValue", false);
};

const onConfirm = () => {
    router.delete(`/product/${props.productId}`);
    close();
};

onMounted(() => {
    if (props.modelValue) panelRef.value?.focus();
});
</script>
