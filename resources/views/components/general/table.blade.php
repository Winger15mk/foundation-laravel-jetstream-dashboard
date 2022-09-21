<table {{ $attributes->merge(['class' => 'min-w-full divide-y-2 divide-gray-200 dark-divide']) }}>
    <thead {{ $attributes->merge(['class' => 'dark-text']) }}>
    {{ $head }}
    </thead>
    <tbody {{ $attributes->merge(['class' => 'divide-y divide-gray-200 dark-divide']) }}>
    {{ $body }}
    </tbody>
</table>
