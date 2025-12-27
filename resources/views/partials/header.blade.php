<nav class="fixed top-0 left-0 right-0 z-50 bg-[#284E4C] border-b border-white/5">
    {{-- max-w-full with large horizontal padding pushes elements to the far edges --}}
    <div class="max-w-full mx-auto px-6 md:px-12">
        <div class="flex items-center justify-between h-20">

            <div class="flex-shrink-0">
                <a href="/" class="group flex items-center">
                    <img src="https://theflex.global/_next/image?url=https%3A%2F%2Flsmvmmgkpbyqhthzdexc.supabase.co%2Fstorage%2Fv1%2Fobject%2Fpublic%2Fwebsite%2FUploads%2FWhite_V3%2520Symbol%2520%26%2520Wordmark.png&w=128&q=75" />
                </a>
            </div>

            <div class="flex items-center gap-10">

                <div class="hidden lg:flex items-center gap-10">
                    @foreach(['Landlords', 'About Us', 'Careers', 'Contact', 'English', 'GBP'] as $link)
                        <a href="#" class="text-[11px] font-bold text-[#FFFDF6]/80 hover:text-white uppercase tracking-[0.3em] transition-all">
                            {{ $link }}
                        </a>
                    @endforeach
                </div>

                <div class="flex items-center gap-6">
                    <button class="lg:hidden text-[#FFFDF6]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8h16M8 16h12"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
</nav>

{{-- Spacer to push the page content down past the fixed header --}}
<div class="h-20 bg-[#284E4C]"></div>
