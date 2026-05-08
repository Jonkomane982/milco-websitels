<?php
/* Template Name: Stakeholders Page */
get_header(); ?>

    <main style="padding: 80px 5%;">
        <div style="text-align: center; margin-bottom: 60px;">
            <h1 style="font-size: 48px; margin-bottom: 15px;">Our Partners & Stakeholders</h1>
            <p style="color: var(--muted); max-width: 700px; margin: 0 auto;">Building a sustainable local economy through collaboration and innovation.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <!-- HUB -->
            <div class="card" style="padding: 40px; text-align: center;">
                <div style="width: 80px; height: 80px; background: #e6f4ea; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 25px;">
                    <i class="fa fa-lightbulb" style="font-size: 32px; color: var(--primary);"></i>
                </div>
                <span class="category-badge" style="margin-bottom: 15px;">Innovation Hub</span>
                <h3>NUL Innovation Hub</h3>
                <p style="color: var(--muted); font-size: 14px; margin: 15px 0 25px;">The founding body of MILCO, fostering entrepreneurship and research at NUL.</p>
                <a href="https://www.nul.ls" target="_blank" class="btn btn-outline" style="width: 100%;">Visit Website</a>
            </div>

            <!-- TOURISM -->
            <div class="card" style="padding: 40px; text-align: center;">
                <div style="width: 80px; height: 80px; background: #fff4e6; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 25px;">
                    <i class="fa fa-mountain" style="font-size: 32px; color: var(--accent);"></i>
                </div>
                <span class="category-badge" style="margin-bottom: 15px;">Government</span>
                <h3>Lesotho Tourism</h3>
                <p style="color: var(--muted); font-size: 14px; margin: 15px 0 25px;">Promoting Basotho heritage and local products to international markets.</p>
                <a href="https://www.ltdc.org.ls" target="_blank" class="btn btn-outline" style="width: 100%;">Visit Website</a>
            </div>

            <!-- HONEY -->
            <div class="card" style="padding: 40px; text-align: center;">
                <div style="width: 80px; height: 80px; background: #fff9e6; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 25px;">
                    <i class="fa fa-bee" style="font-size: 32px; color: #f1c40f;"></i>
                </div>
                <span class="category-badge" style="margin-bottom: 15px;">Cooperative</span>
                <h3>Basotho Honey Cooperative</h3>
                <p style="color: var(--muted); font-size: 14px; margin: 15px 0 25px;">A collective of local beekeepers ensuring organic honey quality and fair trade.</p>
                <a href="#" class="btn btn-outline" style="width: 100%;">Visit Website</a>
            </div>

            <!-- CRAFTS -->
            <div class="card" style="padding: 40px; text-align: center;">
                <div style="width: 80px; height: 80px; background: #f4e6f4; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 25px;">
                    <i class="fa fa-scissors" style="font-size: 32px; color: #9b59b6;"></i>
                </div>
                <span class="category-badge" style="margin-bottom: 15px;">Association</span>
                <h3>Lesotho Crafts Council</h3>
                <p style="color: var(--muted); font-size: 14px; margin: 15px 0 25px;">Preserving traditional weaving and pottery techniques across the kingdom.</p>
                <a href="#" class="btn btn-outline" style="width: 100%;">Visit Website</a>
            </div>

            <!-- AGRI -->
            <div class="card" style="padding: 40px; text-align: center;">
                <div style="width: 80px; height: 80px; background: #e6f4f4; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 25px;">
                    <i class="fa fa-seedling" style="font-size: 32px; color: #16a085;"></i>
                </div>
                <span class="category-badge" style="margin-bottom: 15px;">Academic</span>
                <h3>NUL Agri-Business Faculty</h3>
                <p style="color: var(--muted); font-size: 14px; margin: 15px 0 25px;">Researching local crops and improving agricultural yields for Basotho farmers.</p>
                <a href="https://www.nul.ls" target="_blank" class="btn btn-outline" style="width: 100%;">Visit Website</a>
            </div>

            <!-- MILI -->
            <div class="card" style="padding: 40px; text-align: center;">
                <div style="width: 80px; height: 80px; background: #e6ebf4; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 25px;">
                    <i class="fa fa-flag" style="font-size: 32px; color: #2980b9;"></i>
                </div>
                <span class="category-badge" style="margin-bottom: 15px;">NGO</span>
                <h3>Made In Lesotho Initiative</h3>
                <p style="color: var(--muted); font-size: 14px; margin: 15px 0 25px;">An advocacy group promoting local procurement in both public and private sectors.</p>
                <a href="#" class="btn btn-outline" style="width: 100%;">Visit Website</a>
            </div>
        </div>
    </main>

<?php get_footer(); ?>
