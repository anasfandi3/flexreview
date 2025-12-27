
<section class="relative h-[85vh] min-h-[650px] flex items-center overflow-hidden bg-[#284E4C]">
    <div class="absolute inset-0 z-0">
        {{-- High-end apartment image similar to theflex.global --}}
        <img src="https://theflex.global/home/Hero_Desktop_Large.webp"
             alt="The Flex Premium Living"
             class="w-full h-full object-cover">

        {{-- This overlay uses the brand teal with a gradient to ensure text remains legible --}}
        <div class="absolute inset-0 to-transparent"></div>
    </div>

    <div class="relative z-10 w-full max-w-full mx-auto px-6 md:px-24">
        <div class="mx-auto max-w-3xl">
            <div class="bg-gradiant from-[#284E4C]/60 via-[#284E4C]/40 to-transparent">
                <h1 class="text-6xl md:text-8xl font-bold text-[#FFFDF6] tracking-tighter leading-[0.9] mb-12">
                    Book beautiful <br>
                    <span class="font-light italic opacity-90">flexible stays.</span>
                </h1>
            </div>

            <div class="bg-[#FFFDF6] p-2 rounded-full shadow-2xl flex flex-col md:flex-row items-center max-w-4xl">

                <div class="flex-1 flex items-center gap-4 px-8 py-3 border-r border-[#284E4C]/10">
                    <svg class="w-5 h-5 text-[#284E4C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                    <div class="text-left">
                        <label class="block text-[9px] uppercase tracking-[0.2em] font-black text-[#284E4C]/50">Where</label>
                        <input type="text" placeholder="Search city..." class="w-full bg-transparent text-sm font-bold text-[#284E4C] placeholder-[#284E4C]/30 focus:outline-none">
                    </div>
                </div>

                <div class="flex-1 flex items-center gap-4 px-8 py-3">
                    <svg class="w-5 h-5 text-[#284E4C]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <div class="text-left">
                        <label class="block text-[9px] uppercase tracking-[0.2em] font-black text-[#284E4C]/50">Dates</label>
                        <input type="text" placeholder="Add dates" class="w-full bg-transparent text-sm font-bold text-[#284E4C] placeholder-[#284E4C]/30 focus:outline-none">
                    </div>
                </div>

                <button class="bg-[#284E4C] text-[#FFFDF6] px-12 py-5 rounded-full font-black text-[11px] uppercase tracking-[0.3em] hover:bg-[#1f3b39] transition-all flex items-center gap-3">
                    Search
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>
