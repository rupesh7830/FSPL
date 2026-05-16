<!-- =========================================
     NAVBAR
========================================= -->

<header
class="fixed top-0 right-0
lg:left-[280px]
left-0
z-40
h-[80px]
px-5 lg:px-8
flex items-center justify-between
bg-[#070707]/80
backdrop-blur-3xl
border-b border-white/10">

    <!-- LEFT -->

    <div class="flex items-center gap-4">

        <!-- MOBILE MENU -->

        <button
        id="menuBtn"
        class="lg:hidden
        w-11 h-11
        rounded-xl
        border border-white/10
        bg-white/[0.03]
        text-white">

            ☰

        </button>

        <!-- TITLE -->

        <h2
        class="text-white
        text-[24px]
        font-bold
        font-['Cinzel']">

            Dashboard

        </h2>

    </div>

    <!-- RIGHT -->

    <div class="flex items-center gap-4">

        <!-- PROFILE -->

        <div
        class="flex items-center gap-3
        px-4 h-[48px]
        rounded-2xl
        border border-white/10
        bg-white/[0.03]">

            <!-- IMAGE -->

            <div
            class="w-9 h-9
            rounded-full
            bg-[#D4AF37]
            flex items-center justify-center">

                <span
                class="text-black
                text-sm
                font-bold">

                    A

                </span>

            </div>

            <!-- TEXT -->

            <div class="hidden sm:block">

                <h4
                class="text-white
                text-[13px]
                font-medium
                font-['Outfit']">

                    Admin

                </h4>

                <p
                class="text-white/40
                text-[11px]
                font-['Outfit']">

                    Super Admin

                </p>

            </div>

        </div>

    </div>

</header>