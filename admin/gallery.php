<?php

require_once 'config/db_connect.php';

/* =========================================
   FETCH GALLERY
========================================= */

$query = "
    SELECT *
    FROM gallery
    ORDER BY id DESC
";

$result = mysqli_query($conn, $query);

$total_images = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gallery Management</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background:#050505;
    overflow-x:hidden;
}

::-webkit-scrollbar{
    width:8px;
    height:8px;
}

::-webkit-scrollbar-track{
    background:#0A0A0A;
}

::-webkit-scrollbar-thumb{
    background:rgba(212,175,55,0.35);
    border-radius:50px;
}

::-webkit-scrollbar-thumb:hover{
    background:rgba(212,175,55,0.55);
}

</style>

</head>

<body>

<!-- =========================================
     SIDEBAR
========================================= -->

<?php include 'includes/sidebar.php'; ?>


<!-- =========================================
     MAIN
========================================= -->

<main
class="lg:ml-[280px]
pt-[100px]
p-5 lg:p-8">

    <!-- =====================================
         PAGE HEADER
    ====================================== -->

    <div
    class="flex flex-col lg:flex-row
    lg:items-center
    justify-between
    gap-5">

        <!-- LEFT -->

        <div>

            <h1
            class="text-white
            text-[34px]
            lg:text-[38px]
            font-bold
            tracking-[-1px]
            font-['Cinzel']">

                Gallery Management

            </h1>

            <p
            class="mt-2
            text-white/40
            text-[14px]
            font-['Outfit']">

                Upload and manage FSPL gallery images.

            </p>

        </div>

        <!-- RIGHT -->

        <button
        onclick="openUploadModal()"
        class="h-[52px]
        px-7
        rounded-2xl
        bg-[#D4AF37]
        text-black
        text-[11px]
        uppercase
        tracking-[2px]
        font-bold
        shadow-[0_0_35px_rgba(212,175,55,0.25)]
        hover:scale-[1.02]
        transition-all duration-300
        font-['Cinzel']">

            Upload Images

        </button>

    </div>

    <!-- =====================================
         STATS CARD
    ====================================== -->

    <div
    class="mt-8
    grid
    grid-cols-1
    sm:grid-cols-2
    xl:grid-cols-4
    gap-5">

        <!-- CARD -->

        <div
        class="rounded-[30px]
        border border-white/10
        bg-white/[0.03]
        backdrop-blur-3xl
        p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p
                    class="text-white/40
                    text-[13px]
                    font-['Outfit']">

                        Total Images

                    </p>

                    <h2
                    class="mt-3
                    text-white
                    text-[36px]
                    font-bold
                    font-['Cinzel']">

                        <?= $total_images; ?>

                    </h2>

                </div>

                <div
                class="w-14 h-14
                rounded-2xl
                bg-[#D4AF37]/10
                border border-[#D4AF37]/20
                flex items-center justify-center
                text-[24px]">

                    🖼️

                </div>

            </div>

        </div>

    </div>

    <!-- =====================================
         GALLERY GRID
    ====================================== -->

    <div
    class="grid
    grid-cols-1
    sm:grid-cols-2
    xl:grid-cols-4
    gap-6
    mt-8">

        <?php while($row = mysqli_fetch_assoc($result)): ?>

        <!-- CARD -->

        <div
        class="group
        rounded-[28px]
        overflow-hidden
        border border-white/10
        bg-[#0B0B0B]
        hover:border-[#D4AF37]/20
        transition-all duration-500">

            <!-- IMAGE -->

            <div
            class="relative
            h-[260px]
            overflow-hidden">

                <img
                src="<?= $row['image']; ?>"
                alt=""
                class="w-full h-full
                object-cover
                group-hover:scale-110
                transition-all duration-700">

                <!-- OVERLAY -->

                <div
                class="absolute inset-0
                bg-gradient-to-t
                from-black
                via-black/10
                to-transparent">
                </div>

                <!-- CATEGORY -->

                <div
                class="absolute top-4 left-4
                h-[34px]
                px-4
                rounded-full
                border border-white/10
                bg-black/40
                backdrop-blur-xl
                flex items-center justify-center">

                    <span
                    class="text-white
                    text-[10px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        <?= htmlspecialchars($row['category']); ?>

                    </span>

                </div>

                <!-- DELETE -->

                <a
                href="delete-gallery.php?id=<?= $row['id']; ?>"
                onclick="return confirm('Delete this image?')"
                class="absolute top-4 right-4
                w-10 h-10
                rounded-2xl
                border border-red-500/20
                bg-red-500/10
                backdrop-blur-xl
                flex items-center justify-center
                text-red-300
                hover:bg-red-500/20
                transition-all duration-300">

                    ✕

                </a>

            </div>

            <!-- CONTENT -->

            <div class="p-5">

                <h3
                class="text-white
                text-[17px]
                font-bold
                leading-[28px]
                line-clamp-2
                font-['Cinzel']">

                    <?= htmlspecialchars($row['title']); ?>

                </h3>

                <!-- DATE -->

                <div
                class="mt-4
                flex items-center justify-between">

                    <span
                    class="text-white/35
                    text-[11px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Uploaded

                    </span>

                    <span
                    class="text-white
                    text-[13px]
                    font-medium
                    font-['Outfit']">

                        <?= date("d M Y", strtotime($row['created_at'])); ?>

                    </span>

                </div>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

</main>

<!-- =========================================
     UPLOAD MODAL
========================================= -->

<div
id="uploadModal"
class="fixed inset-0 z-[100]
bg-black/70
backdrop-blur-sm
hidden
items-center justify-center
p-4">

    <!-- MODAL -->

    <div
    class="w-full max-w-[520px]
    rounded-[28px]
    border border-white/10
    bg-[#0B0B0B]
    overflow-hidden
    shadow-[0_0_60px_rgba(0,0,0,0.6)]">

        <!-- TOP -->

        <div
        class="h-[72px]
        px-5
        border-b border-white/10
        flex items-center justify-between">

            <h2
            class="text-white
            text-[22px]
            font-bold
            tracking-[-1px]
            font-['Cinzel']">

                Upload Gallery

            </h2>

            <button
            onclick="closeUploadModal()"
            class="w-10 h-10
            rounded-2xl
            border border-white/10
            bg-white/[0.03]
            text-white
            hover:bg-white/[0.06]
            transition-all duration-300">

                ✕

            </button>

        </div>

        <!-- FORM -->

        <form
        action="upload-gallery.php"
        method="POST"
        enctype="multipart/form-data"
        class="p-5 lg:p-6">

            <!-- GRID -->

            <div
            class="grid
            grid-cols-1
            gap-5">

                <!-- TITLE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[11px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Image Title

                    </label>

                    <input
                    type="text"
                    name="title"
                    placeholder="FSPL Final Match"
                    required
                    class="w-full h-[54px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-white/[0.03]
                    text-white
                    text-[14px]
                    outline-none
                    placeholder:text-white/20
                    focus:border-[#D4AF37]/40">

                </div>

                <!-- CATEGORY -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[11px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Category

                    </label>

                    <select
                    name="category"
                    required
                    class="w-full h-[54px]
                    px-5
                    rounded-2xl
                    border border-white/10
                    bg-[#0B0B0B]
                    text-white
                    text-[14px]
                    outline-none
                    focus:border-[#D4AF37]/40">

                        <option value="">Select Category</option>

                        <option>Matches</option>
                        <option>Trials</option>
                        <option>Winners</option>
                        <option>Events</option>
                        <option>Practice</option>

                    </select>

                </div>

                <!-- IMAGE -->

                <div>

                    <label
                    class="block mb-3
                    text-white/60
                    text-[11px]
                    uppercase
                    tracking-[2px]
                    font-medium
                    font-['Outfit']">

                        Upload Image

                    </label>

                    <div
                    class="relative
                    border-2 border-dashed border-white/10
                    rounded-[24px]
                    p-6
                    text-center
                    bg-white/[0.02]">

                        <input
                        type="file"
                        name="image"
                        required
                        class="absolute inset-0
                        opacity-0
                        cursor-pointer">

                        <div>

                            <div
                            class="w-16 h-16
                            mx-auto
                            rounded-2xl
                            bg-[#D4AF37]/10
                            border border-[#D4AF37]/20
                            flex items-center justify-center">

                                <span class="text-3xl">

                                    📤

                                </span>

                            </div>

                            <h4
                            class="mt-4
                            text-white
                            text-[16px]
                            font-semibold
                            font-['Outfit']">

                                Upload Image

                            </h4>

                            <p
                            class="mt-2
                            text-white/35
                            text-[12px]
                            font-['Outfit']">

                                PNG, JPG & WEBP Supported

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- BUTTONS -->

            <div
            class="flex justify-end gap-3
            mt-6">

                <button
                type="button"
                onclick="closeUploadModal()"
                class="h-[52px]
                px-6
                rounded-2xl
                border border-white/10
                bg-white/[0.03]
                text-white
                text-[13px]
                hover:bg-white/[0.06]
                transition-all duration-300">

                    Cancel

                </button>

                <button
                type="submit"
                class="h-[52px]
                px-8
                rounded-2xl
                bg-[#D4AF37]
                text-black
                text-[11px]
                uppercase
                tracking-[2px]
                font-bold
                hover:scale-[1.02]
                transition-all duration-300
                font-['Cinzel']">

                    Upload

                </button>

            </div>

        </form>

    </div>

</div>

<!-- =========================================
     MODAL SCRIPT
========================================= -->

<script>

function openUploadModal(){

    document.getElementById("uploadModal")
    .classList
    .remove("hidden");

    document.getElementById("uploadModal")
    .classList
    .add("flex");

}

function closeUploadModal(){

    document.getElementById("uploadModal")
    .classList
    .remove("flex");

    document.getElementById("uploadModal")
    .classList
    .add("hidden");

}

</script>

</body>

</html>