<div class="text-center">
    <h3 class="my-5 text-xl font-bold sm:text-3xl">{{ __('Frequently Asked Questions') }}</h3>
    <p class="text-gray-400">{{ __("Here you'll find answers to the most common questions our users.") }}</p>
    <div class="grid grid-cols-1 gap-5 mt-5 text-left md:grid-cols-2 xl:gap-24 lg:gap-18 md:gap-10 sm:mt-16">
        <div class="space-y-4 divide-y">
            @php
                $faqs = [ 
                    [ "title" => "Is SEO a risky and time consuming proposition?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ],
                    [ "title" => "How to choose a perfect digital marketing plan?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ],
                    [ "title" => "Is it feasible to go for a complete website audit?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ]
                ]
            @endphp
            @foreach ($faqs as $faq)                            
                <x-faq-toggle-block :label="$faq['title']" :opened="false">{{ __($faq['content']) }}</x-faq-toggle-block>
            @endforeach
        </div>
        <div class="space-y-4 divide-y">
            @php
                $faqs = [ 
                    [ "title" => "Is SEO a risky and time consuming proposition?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ],
                    [ "title" => "How to choose a perfect digital marketing plan?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ],
                    [ "title" => "Is it feasible to go for a complete website audit?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ]
                ]
            @endphp
            @foreach ($faqs as $faq)                            
                <x-faq-toggle-block :label="$faq['title']" :opened="false">{{ __($faq['content']) }}</x-faq-toggle-block>
            @endforeach
        </div>
    </div>
</div>
