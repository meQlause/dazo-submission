<template>
    <button
        type="button"
        :disabled="disabled"
        :aria-disabled="disabled || undefined"
        class="inline-flex items-center gap-2 h-9 px-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 active:scale-[.98] transition disabled:opacity-50 disabled:cursor-not-allowed"
        @click="onClick"
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
                d="M12 5v14M5 12h14"
            />
        </svg>
        <span class="text-sm font-medium"><slot>Tambah Produk</slot></span>
    </button>
</template>

<script setup lang="ts">

const props = withDefaults(defineProps<{ disabled?: boolean }>(), {
    disabled: false,
});
const emit = defineEmits<{ (e: "click"): void }>();

function onClick(e: MouseEvent) {
    e.preventDefault();
    if (props.disabled) return;
    emit("click");
}
</script>
