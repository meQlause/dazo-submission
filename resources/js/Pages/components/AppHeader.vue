<template>
    <header
        class="flex justify-end w-full h-[72px] bg-white border-b border-neutral-200 items-centerpx-3 sm:px-4"
    >
        <div class="flex items-center gap-2 sm:gap-3">
            <button
                type="button"
                class="inline-flex items-center gap-1.5 rounded-full border border-neutral-200 bg-white h-9 pl-3 pr-2 hover:bg-neutral-50 transition"
                title="Members"
            >
                <svg
                    viewBox="0 0 24 24"
                    class="size-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 11c1.657 0 3-1.79 3-4s-1.343-4-3-4-3 1.79-3 4 1.343 4 3 4zM8 13c-2.761 0-5 2.239-5 5v2h10v-2c0-2.761-2.239-5-5-5zm8 0c-.69 0-1.353.117-1.965.333A6.002 6.002 0 0120 19v1h-4"
                    />
                </svg>
                <span
                    class="text-xs font-medium inline-flex items-center justify-center min-w-6 h-6 rounded-full bg-blue-100 text-blue-700 px-2"
                    >10</span
                >
            </button>

            <button
                type="button"
                class="inline-flex items-center justify-center size-9 rounded-full border border-neutral-200 bg-white hover:bg-neutral-50 active:scale-[.98] transition"
                title="Docs"
            >
                <svg
                    viewBox="0 0 24 24"
                    class="size-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M7 7h7m-7 4h7M5 3h9l5 5v13a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"
                    />
                </svg>
            </button>

            <button
                type="button"
                class="inline-flex items-center justify-center size-9 rounded-full border border-neutral-200 bg-white hover:bg-neutral-50 active:scale-[.98] transition"
                title="Share"
            >
                <svg
                    viewBox="0 0 24 24"
                    class="size-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 12v7a1 1 0 001 1h14a1 1 0 001-1v-7M16 6l-4-4-4 4M12 2v14"
                    />
                </svg>
            </button>

            <button
                type="button"
                class="relative inline-flex items-center justify-center size-9 rounded-full border border-neutral-200 bg-white hover:bg-neutral-50 active:scale-[.98] transition"
                title="Notifications"
            >
                <svg
                    viewBox="0 0 24 24"
                    class="size-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    />
                </svg>
                <span
                    class="absolute -top-0.5 -right-0.5 inline-flex items-center justify-center min-w-4 h-4 text-[10px] font-semibold rounded-full bg-rose-500 text-white px-1"
                    >2</span
                >
            </button>

            <div
                class="inline-flex items-center justify-center size-9 rounded-full overflow-hidden border border-neutral-200 bg-neutral-100"
                title="Profile"
            >
                <img
                    src="https://i.pravatar.cc/100?img=3"
                    alt="User avatar"
                    class="w-full h-full object-cover"
                />
            </div>

            <button
                type="button"
                class="hidden sm:inline-flex items-center gap-2 h-9 pl-3 pr-2 rounded-full border border-neutral-200 bg-white hover:bg-neutral-50 transition"
                title="Plan"
            >
                <span class="text-sm text-neutral-700">Starter Package</span>
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
                        d="M6 9l6 6 6-6"
                    />
                </svg>
            </button>
        </div>
    </header>
</template>

<script setup lang="ts"></script>
