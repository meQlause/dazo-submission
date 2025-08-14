<template>
    <label class="block text-sm font-medium text-neutral-800 mb-1">
        {{ props.label }} <span class="text-rose-600">*</span>
    </label>

    <div class="relative">
        <span v-if="hasSearchStyle" class="absolute top-1/2 -translate-y-1/2">
            <slot name="searchStyle" />
        </span>

        <input
            :name="props.name"
            :type="props.type"
            :placeholder="props.placeholder"
            :class="[
                width,
                'block h-11 rounded-lg border border-neutral-200 bg-white px-3 outline-none focus:ring-2 focus:ring-neutral-900/10',
                hasSearchStyle ? 'pl-[35px]' : '',
            ]"
            :value="props.modelValue"
            @input="onInput"
        />
    </div>

    <div v-if="hasInfo">
        <slot name="info" />
    </div>
</template>

<script setup lang="ts">
import { computed, useSlots } from "vue";

type Model = string | number | undefined;

const props = withDefaults(
    defineProps<{
        label?: string;
        name?: string;
        type?: string;
        placeholder?: string;
        modelValue: Model;
        width?: string;
        modelModifiers?: Record<string, boolean>;
    }>(),
    {
        type: "text",
        width: "w-full",
    }
);

const emit = defineEmits<{ (e: "update:modelValue", v: Model): void }>();

function onInput(e: Event) {
    let value: string | number = (e.target as HTMLInputElement).value;

    if (props.modelModifiers?.trim && typeof value === "string") {
        value = value.trim();
    }
    if (props.modelModifiers?.number) {
        const numeric = Number(value);
        value = isNaN(numeric) ? value : numeric;
    }

    emit("update:modelValue", value);
}

const slots = useSlots();
const hasSearchStyle = computed(() => !!slots.searchStyle);
const hasInfo = computed(() => !!slots.info);
</script>
