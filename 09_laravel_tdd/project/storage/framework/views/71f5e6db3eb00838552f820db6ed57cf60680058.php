<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['messages']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['messages']); ?>
<?php foreach (array_filter((['messages']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if(isset($messages)): ?>
    <ul <?php echo e($attributes->merge(['class' => 'text-sm text-red-600 space-y-1'])); ?>>
        <?php $__currentLoopData = (array) $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($message == 'Pole name jest wymagane'): ?>
                <li class='error'><?php echo e('Pole Imie jest wymagane'); ?></li>
            <?php elseif($message == 'Pole surname jest wymagane'): ?>
                <li class='error'><?php echo e('Pole Nazwisko jest wymagane'); ?></li>
            <?php elseif($message == 'Pole nickname jest wymagane'): ?>
                <li class='error'><?php echo e('Pole Nazwa użytkownika jest wymagane'); ?></li>
            <?php elseif($message == 'Pole password jest wymagane'): ?>
                <li class='error'><?php echo e('Pole Hasło jest wymagane'); ?></li>
            <?php elseif($message == 'Pole repeat password jest wymagane'): ?>
                <li class='error'><?php echo e('Pole Powtórz hasło jest wymagane'); ?></li>
            <?php elseif($message == 'Pole phone number jest wymagane'): ?>
                <li class='error'><?php echo e('Pole Numer telefonu jest wymagane'); ?></li>
            <?php elseif($message == 'Pole person number jest wymagane'): ?>
                <li class='error'><?php echo e('Pole Pesel jest wymagane'); ?></li>
            <?php elseif($message == 'Pole terms jest wymagane'): ?>
                <li class='error'><?php echo e('Wymagana jest akceptacja regulaminu'); ?></li>
            <?php elseif($message == 'The email format is invalid.'): ?>
                <li class='error'><?php echo e('Email jest niepoprawny'); ?></li>
            <?php elseif($message == 'The password format is invalid.' || $message == 'password musi mieć przynajmniej 8 znaków.'): ?>
                <li class='error'><?php echo e('Hasło musi zawierać przynajmniej 8 znaków, wielką literę, małą literę, cyfrę oraz jeden znak specjalny'); ?></li>
            <?php elseif($message == 'Not 18 years old'): ?>
                <li class='error'><?php echo e('Użytkownik musi mieć ukończone 18 lat'); ?></li>
            <?php elseif($message == 'The repeat password and password must match.'): ?>
                <li class='error'><?php echo e('Hasła muszą być identyczne'); ?></li>
            <?php elseif($message == 'eleven characters required'): ?>
                <li class='error'><?php echo e('Pesel musi mieć 11 cyfr'); ?></li>
            <?php elseif($message == 'not numeric values'): ?>
                <li class='error'><?php echo e('Podaj PESEL'); ?></li>
            <?php elseif($message == 'Pole token jest wymagane'): ?>
                <li class="error"><?php echo e('Pole Otrzymany kod jest wymagane'); ?></li>
            <?php elseif($message == 'Pole password confirmation jest wymagane'): ?>
                <li class="error"><?php echo e('Pole Potwierdź hasło jest wymagane'); ?></li>
            <?php elseif($message == 'Pole password różni się od pola Potwierdź password.'): ?>
                <li class="error"><?php echo e('Pole Hasło różni się od pola Potwierdź hasło.'); ?></li>
            <?php elseif($message == 'The amount must be a number.'): ?>
                <li class="error"><?php echo e('Podaj właściwą kwotę.'); ?></li>
            <?php elseif($message == 'Pole amount jest wymagane'): ?>
                <li class="error"><?php echo e('Należy podac kwotę.'); ?></li>
            <?php else: ?>
                <li class="error"><?php echo e($message); ?></li>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH /home/student/PHP/php_2022_bukmacher/09_laravel_tdd/project/resources/views/components/input-error.blade.php ENDPATH**/ ?>