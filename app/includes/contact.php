<section id="contact" class="section section-contact">
    <h2 class="section__title">Contactez nous</h2>

    <div class="contact-forms">
        <div class="contact-informations">
            <div class="contact-detail">
                <div class="contact-detail__icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="contact-detail__info">
                    <a href="tel:+35226561073">+352 26 56 10 73</a>
                </div>
            </div>
            <div class="contact-detail">
                <div class="contact-detail__icon">
                    <i class="fa fa-fax"></i>
                </div>
                <div class="contact-detail__info">
                    +352 26 56 12 35
                </div>
            </div>
            <div class="contact-detail">
                <div class="contact-detail__icon">
                    <i class="fa fa-mobile"></i>
                </div>
                <div class="contact-detail__info">
                    <a href="tel:+352691621865">+352 691 62 18 65</a>
                </div>
            </div>
            <div class="contact-detail">
                <div class="contact-detail__icon">
                    <i class="fa fa-envelope-o"></i>
                </div>
                <div class="contact-detail__info">
                    <a href="mailto:decorspartners@gmail.com">decorspartners@gmail.com</a>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form id="contact-form" method="post" action="" novalidate>
                <div class="form-group">
                    <label for="nameInput">Votre nom complet *</label>
                    <input type="text" id="nameInput" class="form-control" name="nameInput" placeholder="Nom Prénom" required value="<?= $name ?>" />
                    <span class="errorMsg"><?= $errors['nameInput'] ?></span>
                </div>
                <div class="form-group">
                    <label for="emailInput">Votre mail *</label>
                    <input type="email" id="emailInput" class="form-control" name="emailInput" placeholder="example@mail.lu" required value="<?= $email ?>" />
                    <span class="errorMsg"><?= $errors['emailInput'] ?></span>
                </div>
                <div class="form-group">
                    <label for="subjectInput">Sujet *</label>
                    <input type="text" id="subjectInput" class="form-control" name="subjectInput" placeholder="Sujet..." required value="<?= $subject ?>" />
                    <span class="errorMsg"><?= $errors['subjectInput'] ?></span>
                </div>
                <div class="form-group">
                    <label for="messageInput">Message *</label>
                    <textarea id="messageInput" class="form-control" name="messageInput" rows="8" placeholder="Votre message..." required"><?= $message ?></textarea>
                    <span class="errorMsg"><?= $errors['messageInput'] ?></span>
                </div>
                <input type="submit" value="Envoyer" class="btn btn-block" />
            </form>
        </div>
    </div>
</section>
