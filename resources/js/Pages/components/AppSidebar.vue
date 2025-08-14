<template>
    <div
        class="absolute inset-x-0 top-0 h-6 bg-gradient-to-b from-white to-transparent z-20 pointer-events-none"
    ></div>
    <aside
        class="relative duration-300 h-screen transition-all bg-white border-r border-neutral-200 shadow-[0_0_30px_rgba(0,0,0,0.3)] flex flex-col"
        :class="collapsed ? 'w-[0px]' : 'w-[275px]'"
    >
        <div class="flex items-center gap-2 px-4 py-3">
            <img
                v-show="!collapsed"
                src="https://dummyimage.com/96x28/ffffff/0f172a&text=dazo.id"
                alt="Logo"
                class="h-7 w-auto select-none"
                draggable="false"
            />
            <div v-show="collapsed" class="h-7 w-7 bg-neutral-100 rounded-md" />

            <button
                @click="toggle()"
                class="absolute -right-6 top-3 h-[48px] w-[48px] rounded-full bg-white border border-white items-center hover:bg-neutral-50 flex"
                :class="
                    collapsed
                        ? '-right-10 w-[100px] rounded-l-none text-right place-items-end justify-end pr-[5px]'
                        : 'justify-center'
                "
                aria-label="Toggle sidebar"
            >
                <div
                    class="h-[32px] flex transition-all duration-400 items-center justify-center border-black border-1 rounded-full w-[32px]"
                    :class="
                        collapsed &&
                        'w-[100px] justify-end pr-[10px] rounded-l-none'
                    "
                >
                    <svg
                        v-if="!collapsed"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-4 w-4 text-neutral-700"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12.78 15.28a.75.75 0 0 1-1.06 0l-4-4a.75.75 0 0 1 0-1.06l4-4a.75.75 0 1 1 1.06 1.06L9.06 10l3.72 3.72a.75.75 0 0 1 0 1.06Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <svg
                        v-else
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-4 w-4 text-neutral-700"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.22 4.72a.75.75 0 0 1 1.06 0l4 4a.75.75 0 0 1 0 1.06l-4 4a.75.75 0 1 1-1.06-1.06L10.94 10 7.22 6.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
            </button>
        </div>

        <nav class="px-3 pb-4 flex-1 overflow-y-auto">
            <button
                class="w-full flex items-center justify-between rounded-md px-2 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-50"
                :class="collapsed && 'hidden'"
                @click="produkOpen = !produkOpen"
                :aria-expanded="produkOpen"
            >
                <span class="flex items-center gap-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 text-neutral-500"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.6"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                    <span v-show="!collapsed">Produk</span>
                </span>

                <svg
                    v-show="!collapsed"
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 text-neutral-500 transition-transform"
                    :class="produkOpen ? 'rotate-180' : 'rotate-0'"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.06l3.71-3.83a.75.75 0 1 1 1.08 1.04l-4.25 4.4a1 1 0 0 1-1.44 0L5.25 8.27a.75.75 0 0 1-.02-1.06Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>

            <transition name="collapse">
                <ul
                    v-show="produkOpen"
                    class="mt-2 space-y-1"
                    :class="collapsed && 'hidden'"
                >
                    <li>
                        <button
                            @click="active = 'daftar-produk'"
                            class="group w-full flex items-center gap-2 rounded-md px-2 py-2 text-sm"
                            :class="[
                                collapsed ? 'justify-center' : 'justify-start',
                                active === 'daftar-produk'
                                    ? 'bg-[#1E40AF] text-white'
                                    : 'text-neutral-700 hover:bg-neutral-50',
                            ]"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                viewBox="0 0 24 24"
                                fill="none"
                                :stroke="
                                    active === 'daftar-produk'
                                        ? 'currentColor'
                                        : 'currentColor'
                                "
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M8 6h13" />
                                <path d="M8 12h13" />
                                <path d="M8 18h13" />
                                <path d="M3 6h.01" />
                                <path d="M3 12h.01" />
                                <path d="M3 18h.01" />
                            </svg>
                            <span v-show="!collapsed">Daftar Produk</span>
                        </button>
                    </li>
                </ul>
            </transition>
        </nav>
    </aside>
</template>

<script setup lang="ts">
import { ref, watch } from "vue";

const props = withDefaults(
    defineProps<{
        modelValue?: boolean;
        defaultCollapsed?: boolean;
    }>(),
    { defaultCollapsed: false }
);

const controlled = ref(props.modelValue !== undefined);
const collapsed = ref(props.modelValue ?? props.defaultCollapsed);

const emit = defineEmits<{
    (e: "update:modelValue", v: boolean): void;
    (e: "navigate", key: string): void;
}>();

watch(
    () => props.modelValue,
    (v) => {
        if (v !== undefined) {
            collapsed.value = v;
            controlled.value = true;
        }
    }
);

const produkOpen = ref(true);
const active = ref<"daftar-produk" | "">("daftar-produk");

function toggle() {
    if (controlled.value) emit("update:modelValue", !collapsed.value);
    collapsed.value = !collapsed.value;
}
</script>
