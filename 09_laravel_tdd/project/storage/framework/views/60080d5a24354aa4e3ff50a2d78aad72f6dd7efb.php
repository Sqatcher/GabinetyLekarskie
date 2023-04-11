<script>
    let isDisc = false;
    function scrollToBottom(id) {
        let element = document.getElementById(id);
        element.scrollIntoView(false);
    }
    function showDisciplines() {
        let menu = document.getElementById("DisciplineMenu")
        if (isDisc) {
            menu.style.display = "none";
            isDisc = false;
        }
        else {
            menu.style.display = "grid";
            isDisc = true;
        }
    }
</script>

<style>
    .big-letters {
        font-size: 30px;
    }
    .medium-letters {
        font-size: 20px;
    }
    .small-letters {
        font-size: 10px;
    }
    .navbar {
        margin-left: auto;
        margin-right: auto;
        overflow: hidden;
        background-color: whitesmoke;
        position: fixed; /* Set the navbar to fixed position */
        top: 0; /* Position the navbar at the top of the page */
        width: 99%;
        z-index: 1;
    }
    #MainLogoImg {
        width: 90px;
    }

    #user_icon_image {
        width: 90px;
    }

    #DisciplineMenu {
        position: fixed;
        top: 160px;
        left: 720px;
        width: 400px;
        height: 80px;
        display: none;
        grid-template-columns: 33% 33% 33%;
        z-index: 2;
        border: 3px solid brown;
        border-radius: 3px;
        padding: 4px;
        background-color: whitesmoke;
    }
    #DisciplineMenu > a {
        font-size: 20px;
        text-align: center;
    }
</style>
<div id="DisciplineMenu">
    <a href="<?php echo e(url('/bets/football')); ?>">Piłka Nożna</a>
    <a href="<?php echo e(url('/bets/volleyball')); ?>">Siatkówka</a>
    <a href="<?php echo e(url('/bets/dart')); ?>">Dart</a>
    <a href="<?php echo e(url('/bets/handball')); ?>">Piłka Ręczna</a>
    <a href="<?php echo e(url('/bets/basketball')); ?>">Koszykówka</a>
    <a href="<?php echo e(url('/bets/esport')); ?>">E-sport</a>
</div>
<div class="navbar">
    <?php if(Route::has('login')): ?>
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <?php if(auth()->guard()->check()): ?>
                <a id="UserIconA" href="<?php echo e(url('/account')); ?>"><img id="user_icon_image" src="<?php echo e(asset('img/userIcon.png')); ?>" alt="user icon"></a>
                <p class="text-sm text-gray-700 dark:text-gray-500 medium-letters">Stan konta: <?php echo e($user->deposit); ?></p>
                <p class="text-sm text-gray-700 dark:text-gray-500 medium-letters">Konto <?php echo e($user->premium == 1 ? __('Premium') : __('Standardowe')); ?></p>
                <?php if(isset($premium_expire)): ?>
                    <p class="text-sm text-gray-700 dark:text-gray-500 medium-letters"><?php echo e($premium_expire); ?></p>
                <?php endif; ?>
                





                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ml-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3']); ?>
                        <?php echo e(__('Wyloguj się')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </form>
            <?php else: ?>
                <a id="login_link" href="<?php echo e(route('login')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline medium-letters">Zaloguj się</a>

                <?php if(Route::has('register')): ?>
                    <a id="register_link" href="<?php echo e(route('register')); ?>" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline medium-letters">Zarejestruj się</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block">
        <img id="MainLogoImg" src="<?php echo e(asset('img/KGKMBets.svg')); ?> " alt="Logo">
    </div>

    <br><br><br><br>
    <div class="hidden fixed sm:block px-6 py-5"  style="z-index: 1; border-bottom: 2px solid brown; background-color: whitesmoke; margin-left: 4px">
        <a class="text-sm text-gray-700 dark:text-gray-500 big-letters" style="margin-right: 15px;" href="<?php echo e(url('/home')); ?>">Strona główna</a>
        <a class="text-sm text-gray-700 dark:text-gray-500 big-letters" style="margin-right: 15px;" href="<?php echo e(url('/bets')); ?>">Zakłady bukmacherskie</a>
        <a class="text-sm text-gray-700 dark:text-gray-500 big-letters" style="margin-right: 15px;" href="<?php echo e(url('/specialoffers')); ?>">Zakłady specjalne</a>
        <a class="text-sm text-gray-700 dark:text-gray-500 big-letters" style="margin-right: 15px;" href="#" onclick="showDisciplines()">Dyscypliny</a>
        <a class="text-sm text-gray-700 dark:text-gray-500 big-letters" style="margin-right: 15px;" href="<?php echo e(url('/results')); ?>">Wyniki</a>

        <?php if(auth()->guard()->check()): ?>
            <?php if (isset($user) && $user->premium) {?>
            <a class="text-sm text-gray-700 dark:text-gray-500 big-letters" style="margin-right: 10px;" href="<?php echo e(url('/livebets')); ?>">Zakłady live</a>
            <a class="text-sm text-gray-700 dark:text-gray-500 big-letters" style="margin-right: 10px;" href="<?php echo e(url('/scratchcard')); ?>">Zdrapka</a>
            <?php } ?>
        <?php endif; ?>
    </div>
    <br><br>
        <?php if(count(explode('/', substr(url()->current(), 7))) == 1): ?>
            <br>
            <div class="hidden fixed sm:block" style="margin-left: 10%;">
                <a class="text-sm text-gray-700 dark:text-gray-500 medium-letters underline" style="margin-right: 10px;" onclick="scrollToBottom('us')">O nas</a>
                <a class="text-sm text-gray-700 dark:text-gray-500 medium-letters underline" style="margin-right: 10px;" onclick="scrollToBottom('contact')">Kontakt</a>
                <a class="text-sm text-gray-700 dark:text-gray-500 medium-letters underline" style="margin-right: 10px;" onclick="scrollToBottom('rules')">Regulamin</a>
            </div>
        <?php endif; ?>
</div>
<?php /**PATH /home/student/PHP/php_2022_bukmacher/09_laravel_tdd/project/resources/views/partial/header.blade.php ENDPATH**/ ?>