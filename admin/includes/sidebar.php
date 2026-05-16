<!-- =========================================
     MOBILE OVERLAY
========================================= -->

<div
id="sidebarOverlay"
class="fixed inset-0 z-40
bg-black/60
backdrop-blur-sm
hidden lg:hidden">
</div>

<!-- =========================================
     SIDEBAR
========================================= -->

<aside
id="sidebar"
class="fixed top-0 left-0 z-50
w-[280px]
h-screen
bg-[#070707]/95
backdrop-blur-3xl
border-r border-white/10
transition-transform duration-300 ease-in-out
transform
-translate-x-full
lg:translate-x-0">

    <!-- =====================================
         TOP
    ====================================== -->

    <div
    class="h-[80px]
    px-6
    flex items-center justify-between
    border-b border-white/10">

        <!-- LOGO -->

        <h1
        class="text-white
        text-[24px]
        font-bold
        tracking-[-1px]
        font-['Cinzel']">

            FSPL

        </h1>

        <!-- CLOSE BUTTON -->

        <button
        id="closeSidebar"
        class="lg:hidden
        w-10 h-10
        rounded-xl
        border border-white/10
        bg-white/[0.03]
        text-white
        text-lg
        flex items-center justify-center">

            ✕

        </button>

    </div>

    <!-- =====================================
         MENU
    ====================================== -->

    <div
    class="p-4
    space-y-2
    overflow-y-auto
    h-[calc(100vh-80px)]">

        <!-- DASHBOARD -->

        <a
        href="dashboard.php"
        class="flex items-center gap-4
        h-[56px]
        px-4
        rounded-2xl
        bg-[#D4AF37]
        text-black
        font-medium
        transition-all duration-300
        font-['Outfit']">

            <span class="text-lg">🏠</span>

            <span>Dashboard</span>

        </a>

        <!-- PLAYERS -->

        <a
        href="players.php"
        class="flex items-center gap-4
        h-[56px]
        px-4
        rounded-2xl
        text-white/70
        hover:bg-white/[0.04]
        hover:text-white
        transition-all duration-300
        font-medium
        font-['Outfit']">

            <span class="text-lg">👨‍💼</span>

            <span>Players</span>

        </a>

        <!-- TRIALS -->

        <a
        href="trials.php"
        class="flex items-center gap-4
        h-[56px]
        px-4
        rounded-2xl
        text-white/70
        hover:bg-white/[0.04]
        hover:text-white
        transition-all duration-300
        font-medium
        font-['Outfit']">

            <span class="text-lg">🏏</span>

            <span>Trials</span>

        </a>

        <!-- REGISTRATIONS -->

        <a
        href="registrations.php"
        class="flex items-center gap-4
        h-[56px]
        px-4
        rounded-2xl
        text-white/70
        hover:bg-white/[0.04]
        hover:text-white
        transition-all duration-300
        font-medium
        font-['Outfit']">

            <span class="text-lg">📝</span>

            <span>Registrations</span>

        </a>

        <!-- GALLERY -->

        <a
        href="gallery.php"
        class="flex items-center gap-4
        h-[56px]
        px-4
        rounded-2xl
        text-white/70
        hover:bg-white/[0.04]
        hover:text-white
        transition-all duration-300
        font-medium
        font-['Outfit']">

            <span class="text-lg">🖼️</span>

            <span>Gallery</span>

        </a>

        <!-- SETTINGS -->

        <a
        href="settings.php"
        class="flex items-center gap-4
        h-[56px]
        px-4
        rounded-2xl
        text-white/70
        hover:bg-white/[0.04]
        hover:text-white
        transition-all duration-300
        font-medium
        font-['Outfit']">

            <span class="text-lg">⚙️</span>

            <span>Settings</span>

        </a>

    </div>

</aside>

<!-- =========================================
     MOBILE MENU BUTTON
========================================= -->

<button
id="openSidebar"
class="fixed top-5 left-5 z-[60]
lg:hidden
w-12 h-12
rounded-2xl
border border-white/10
bg-[#111111]/80
backdrop-blur-xl
text-white
text-xl
flex items-center justify-center">

    ☰

</button>

<!-- =========================================
     SIDEBAR SCRIPT
========================================= -->

<script>

/* =========================================
   ELEMENTS
========================================= */

const sidebar = document.getElementById("sidebar");

const openSidebar = document.getElementById("openSidebar");

const closeSidebar = document.getElementById("closeSidebar");

const sidebarOverlay = document.getElementById("sidebarOverlay");

/* =========================================
   OPEN SIDEBAR
========================================= */

openSidebar.addEventListener("click", () => {

    sidebar.classList.remove("-translate-x-full");

    sidebarOverlay.classList.remove("hidden");

});

/* =========================================
   CLOSE SIDEBAR
========================================= */

closeSidebar.addEventListener("click", closeSidebarMenu);

sidebarOverlay.addEventListener("click", closeSidebarMenu);

/* =========================================
   FUNCTION
========================================= */

function closeSidebarMenu(){

    sidebar.classList.add("-translate-x-full");

    sidebarOverlay.classList.add("hidden");

}

/* =========================================
   AUTO CLOSE ON LARGE SCREEN
========================================= */

window.addEventListener("resize", () => {

    if(window.innerWidth >= 1024){

        sidebar.classList.remove("-translate-x-full");

        sidebarOverlay.classList.add("hidden");

    }else{

        sidebar.classList.add("-translate-x-full");

    }

});

</script>