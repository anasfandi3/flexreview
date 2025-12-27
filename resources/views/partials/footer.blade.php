<footer class="bg-[#284E4C] text-[#FFFDF6] pt-20 pb-12 mt-20">
    {{-- The Fixed-Width Container --}}
    <div class="container mx-auto max-w-7xl px-6 lg:px-8">

        {{-- 5 Column Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-12 mb-20">

            <div class="flex flex-col space-y-6">
                <h4 class="text-[10px] font-black uppercase tracking-[0.4em] opacity-60">Newsletter</h4>
                <p class="text-sm leading-relaxed opacity-80">
                    Join our community for exclusive property updates.
                </p>
                <form class="relative max-w-xs">
                    <input type="email" placeholder="Email address"
                        class="w-full bg-transparent border-b border-[#FFFDF6]/30 py-2 text-sm focus:outline-none focus:border-[#FFFDF6] transition-colors placeholder-[#FFFDF6]/30">
                    <button class="absolute right-0 top-2 opacity-60 hover:opacity-100 transition-opacity">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </button>
                </form>
            </div>

            <div class="flex flex-col space-y-6">
                <div class="text-2xl font-bold tracking-tighter">The Flex<span class="text-emerald-400">.</span></div>
                <p class="text-xs opacity-70 leading-relaxed italic pr-4">
                    The new standard for flexible living. Premium, fully-serviced apartments for the global citizen.
                </p>
                <div class="flex gap-4">
                    @foreach(['ig', 'li'] as $social)
                        <a href="#" class="w-8 h-8 rounded-full border border-[#FFFDF6]/20 flex items-center justify-center text-[10px] font-bold uppercase tracking-tighter opacity-60 hover:opacity-100 hover:border-[#FFFDF6] transition-all">
                            {{ $social }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col space-y-6">
                <h4 class="text-[10px] font-black uppercase tracking-[0.4em] opacity-60">Company</h4>
                <ul class="space-y-3 text-[11px] font-bold uppercase tracking-[0.2em]">
                    <li><a href="#" class="hover:text-emerald-400 transition-colors">Properties</a></li>
                    <li><a href="#" class="hover:text-emerald-400 transition-colors">Solutions</a></li>
                    <li><a href="#" class="hover:text-emerald-400 transition-colors">Careers</a></li>
                </ul>
            </div>

            <div class="flex flex-col space-y-6">
                <h4 class="text-[10px] font-black uppercase tracking-[0.4em] opacity-60">Locations</h4>
                <ul class="space-y-3 text-[11px] font-bold uppercase tracking-[0.2em]">
                    <li><a href="#" class="hover:text-emerald-400 transition-colors">London</a></li>
                    <li><a href="#" class="hover:text-emerald-400 transition-colors">Lisbon</a></li>
                    <li><a href="#" class="hover:text-emerald-400 transition-colors">Paris</a></li>
                </ul>
            </div>

            <div class="flex flex-col space-y-6 text-right lg:text-left">
                <h4 class="text-[10px] font-black uppercase tracking-[0.4em] opacity-60">Contact</h4>
                <div class="space-y-2 text-xs font-medium">
                    <p class="opacity-80">hello@theflex.global</p>
                    <p class="opacity-60 leading-relaxed">
                        29 Shoreditch Heights,<br>
                        London, E1 6PX
                    </p>
                </div>
            </div>
        </div>

        {{-- Bottom Copyright Area --}}
        <div class="pt-8 border-t border-[#FFFDF6]/10 flex flex-col md:flex-row justify-between items-center gap-4 text-[9px] font-bold uppercase tracking-[0.3em] opacity-40">
            <p>&copy; {{ date('Y') }} THE FLEX GLOBAL</p>
            <div class="flex gap-6">
                <a href="#" class="hover:opacity-100">Privacy</a>
                <a href="#" class="hover:opacity-100">Terms</a>
            </div>
        </div>
    </div>
</footer>
