<?php $ses = new \Model\Session(); ?>
<section class="class_100" >
    <div class="class_101" >
        <div class="class_102" >
            <h1 class="class_103"  >
                Subscribe
            </h1>
            <div class="class_32"  >
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it
            </div>
            <div class="class_105"  placeholder="Enter Email" required="true" type="email">
                <input placeholder="Enter Email" type="text" name="username" class="class_106" >
                <button class="class_107"  >
                    Send
                </button>
            </div>
        </div>
    </div>
    <div class="class_108" >
        <div class="class_109" >
            <h1 class="class_110"  >

            </h1>
            <div class="class_111"  >
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it
            </div>
        </div>
        <div class="class_109" >
            <h1 class="class_112"  >
                Navigation
            </h1>
            <a href="<?=ROOT?>" class="class_113"  >
                Home
            </a>
            <a href="<?=ROOT?>/podcasters" class="class_114"  >
                Podcasters
            </a>
            <a href="<?=ROOT?>/recent" class="class_115"  >
                Recent Podcasts
            </a>
            <a href="<?=ROOT?>/popular" class="class_114"  >
                Popular Podcasts
            </a>

            <?php if(!$ses->is_logged_in()):?>
                <a href="<?=ROOT?>/signup" class="class_114"  >
                    Signup
                </a>

                <a href="<?=ROOT?>/login" class="class_114"  >
                    Login
                </a>
            <?php else: ?>
                <a href="<?=ROOT?>/profile" class="class_114"  >
                    Profile
                </a>
                <a href="<?=ROOT?>/upload" class="class_114"  >
                    New podcast
                </a>
                <a href="<?=ROOT?>/logout" class="class_114"  >
                    Logout
                </a>
            <?php endif; ?>
        </div>
        <div class="class_109" >
            <h1 class="class_110"  >
                Search
            </h1>
            <div class="class_32"  >
                Search for your favorite podcasts here, by podcast title or podcaster's name
                <br>
            </div>
            <div class="class_105"  placeholder="Enter Email" required="true" type="email">
                <input placeholder="Find podcast by title" type="text" name="username" class="class_106" >
                <button class="class_107"  >
                    Find
                </button>
            </div>
        </div>
    </div>
</section>

</body>
</html>
