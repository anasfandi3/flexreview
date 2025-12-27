<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
    @foreach($reviews as $review)
        @php
            // Layout Logic
            $isMiddleColumn = ($loop->iteration % 3 == 2);
            // Color Logic: Every 4th card is dark for visual rhythm
            $isDarkCard = ($loop->iteration % 4 == 0);

            // Format initials from guest_name
            $nameParts = explode(' ', $review->guest_name);
            $initials = collect($nameParts)->map(fn($n) => substr($n, 0, 1))->take(2)->join('');
        @endphp

        <div class="p-10 rounded-[2.5rem] shadow-[0_15px_40px_rgba(40,78,76,0.05)] flex flex-col justify-between transition-all duration-500
            {{ $isDarkCard ? 'bg-[#284E4C] text-[#FFFDF6]' : 'bg-white text-[#284E4C] border border-[#284E4C]/5' }}
            {{ $isMiddleColumn ? 'lg:translate-y-12' : '' }}">

            <div>
                <div class="flex gap-1 mb-8 {{ $isDarkCard ? 'text-emerald-400' : 'text-emerald-600' }}">
                    @php $rating = round($review->average_rating / 2); @endphp {{-- Assuming 10 point scale converted to 5 stars --}}
                    @for($i=0; $i < 5; $i++)
                        <svg class="w-3.5 h-3.5 {{ $i < $rating ? 'fill-current' : 'fill-transparent stroke-current' }}" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                    @endfor
                </div>

                <p class="text-lg leading-relaxed font-medium tracking-tight italic">
                    "{{ Str::limit($review->review_text, 150) }}"
                </p>
            </div>

            <div class="mt-12 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-[10px] font-black
                        {{ $isDarkCard ? 'bg-[#FFFDF6] text-[#284E4C]' : 'bg-[#284E4C] text-[#FFFDF6]' }}">
                        {{ $initials }}
                    </div>

                    <div>
                        <h4 class="font-bold text-sm">{{ $review->guest_name }}</h4>
                        <p class="text-[9px] uppercase tracking-widest {{ $isDarkCard ? 'opacity-60' : 'text-[#284E4C]/50' }}">
                            {{ $review->listing_name }}
                        </p>
                    </div>
                </div>

                <div class="opacity-30 text-[8px] font-black uppercase tracking-widest">
                    {{ $review->channel }}
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- Spacer to prevent overlap with footer due to the 'translate-y' --}}
<div class="h-32"></div>
