<?php
/**
 * Template: Library (புத்தகங்கள்) — kadavulmattum.org
 *
 * Auto-loads for the page with slug "library" via the WordPress template
 * hierarchy. Reads the shared book feed on godalone.in (one source of truth
 * for all three sites) and renders the grid server-side, in Tamil.
 *
 * Feed: godalone.in /wp-content/uploads/data/books.json
 * Cached for 12 hours in the km_library_books_v2 transient.
 * Colours come from the theme tokens, so day/night mode need no extra rules.
 */

get_header();

$km_lang = 'ta';
$km_feed = 'https://godalone.in/wp-content/uploads/data/books.json';

$km_books = get_transient( 'km_library_books_v2' );
if ( false === $km_books ) {
	$km_res = wp_remote_get( $km_feed, array( 'timeout' => 10 ) );
	if ( ! is_wp_error( $km_res ) && 200 === (int) wp_remote_retrieve_response_code( $km_res ) ) {
		$km_data = json_decode( wp_remote_retrieve_body( $km_res ), true );
		if ( ! empty( $km_data['books'] ) && is_array( $km_data['books'] ) ) {
			$km_books = $km_data['books'];
			set_transient( 'km_library_books_v2', $km_books, 12 * HOUR_IN_SECONDS );
		}
	}
}
if ( ! is_array( $km_books ) ) {
	$km_books = array();
}

/* Tamil books first, the rest in feed order. */
$km_ta = array();
$km_other = array();
foreach ( $km_books as $km_b ) {
	if ( isset( $km_b['lang'] ) && 'ta' === $km_b['lang'] ) {
		$km_ta[] = $km_b;
	} else {
		$km_other[] = $km_b;
	}
}
$km_books = array_merge( $km_ta, $km_other );

if ( ! function_exists( 'km_lib_pick' ) ) {
	function km_lib_pick( $field, $book, $lang = 'ta' ) {
		if ( ! empty( $book[ $field ][ $lang ] ) ) {
			return $book[ $field ][ $lang ];
		}
		if ( ! empty( $book[ $field ]['en'] ) ) {
			return $book[ $field ]['en'];
		}
		return '';
	}
}

$km_lang_names = array(
	'ta' => 'தமிழ்',
	'en' => 'ஆங்கிலம்',
	'hi' => 'ஹிந்தி',
	'ur' => 'உருது',
);
$km_filters = array(
	'all' => '🌍 அனைத்து மொழிகள்',
	'ta'  => 'தமிழ்',
	'en'  => 'ஆங்கிலம்',
	'hi'  => 'ஹிந்தி',
	'ur'  => 'உருது',
);
?>

<section class="page-hero">
	<div class="wrap">
		<div class="crumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">முகப்பு</a> / புத்தகங்கள்</div>
		<h1>📚 புத்தகங்கள்</h1>
		<p class="ar">اقْرَأْ بِاسْمِ رَبِّكَ</p>
		<p>“உன்னைப் படைத்த உன் இறைவனின் பெயரால் ஓதுவாயாக.” — குர்ஆன் 96:1<br>
		அல்ஹம்துலில்லாஹ், கீழே உள்ள ஒவ்வொரு நூலையும் இலவசமாகப் பதிவிறக்கம் செய்யலாம்.</p>
	</div>
</section>

<section class="blk">
	<div class="wrap">

	<?php if ( empty( $km_books ) ) : ?>

		<p class="kmb-state">⚠️ நூல் பட்டியலை இப்போது ஏற்ற முடியவில்லை.</p>
		<p class="kmb-state"><a class="btn btn-gold" href="https://godalone.in/library/">godalone.in நூலகத்தைப் பார்க்க</a></p>

	<?php else : ?>

		<nav class="kmb-filters" id="kmbFilters" aria-label="மொழி வடிகட்டி">
			<?php foreach ( $km_filters as $km_code => $km_label ) : ?>
				<button type="button" class="kmb-chip<?php echo ( 'all' === $km_code ) ? ' is-active' : ''; ?>" data-lang="<?php echo esc_attr( $km_code ); ?>"><?php echo esc_html( $km_label ); ?></button>
			<?php endforeach; ?>
		</nav>

		<p class="kmb-count" id="kmbCount" aria-live="polite">மொத்தம் <?php echo count( $km_books ); ?> நூல்களில் <?php echo count( $km_books ); ?> காட்டப்படுகிறது</p>

		<div class="grid grid-4 kmb-grid" id="kmbGrid">
			<?php
			foreach ( $km_books as $km_b ) :
				$km_title = km_lib_pick( 'title', $km_b, $km_lang );
				$km_code  = isset( $km_b['lang'] ) ? $km_b['lang'] : '';
				$km_pages = km_lib_pick( 'pagesLabel', $km_b, $km_lang );
				?>
				<article class="kmb-card" data-lang="<?php echo esc_attr( $km_code ); ?>">
					<div class="kmb-cover">
						<?php if ( ! empty( $km_b['cover'] ) ) : ?>
							<img src="<?php echo esc_url( $km_b['cover'] ); ?>" alt="<?php echo esc_attr( $km_title ); ?>" loading="lazy">
						<?php else : ?>
							<span class="kmb-ph">📖</span>
						<?php endif; ?>
						<?php if ( $km_pages ) : ?><span class="kmb-pages"><?php echo esc_html( $km_pages ); ?></span><?php endif; ?>
						<?php if ( isset( $km_lang_names[ $km_code ] ) ) : ?><span class="kmb-tag"><?php echo esc_html( $km_lang_names[ $km_code ] ); ?></span><?php endif; ?>
					</div>
					<div class="kmb-body">
						<h2 class="kmb-name"><?php echo esc_html( $km_title ); ?></h2>
						<p class="kmb-by"><?php echo esc_html( km_lib_pick( 'author', $km_b, $km_lang ) ); ?></p>
						<p class="kmb-desc"><?php echo esc_html( km_lib_pick( 'desc', $km_b, $km_lang ) ); ?></p>
						<div class="kmb-btns">
							<?php if ( ! empty( $km_b['download'] ) ) : ?>
								<a class="btn btn-gold" href="<?php echo esc_url( $km_b['download'] ); ?>" target="_blank" rel="noopener">📥 இலவசப் பதிவிறக்கம்</a>
							<?php endif; ?>
							<?php if ( ! empty( $km_b['page'] ) ) : ?>
								<a class="btn btn-gold" href="<?php echo esc_url( $km_b['page'] ); ?>">↗️ பக்கத்தைத் திறக்க</a>
							<?php endif; ?>
							<?php if ( ! empty( $km_b['purchase'] ) ) : ?>
								<a class="btn btn-ghost" href="<?php echo esc_url( $km_b['purchase'] ); ?>" target="_blank" rel="noopener">🛒 வாங்க</a>
							<?php endif; ?>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

		<div class="kmb-foot">
			<p class="ar">رَبِّ زِدْنِي عِلْمًا</p>
			<p>“என் இறைவா, எனக்கு அறிவை அதிகரிப்பாயாக.” — குர்ஆன் 20:114</p>
		</div>

	</div>
</section>

<style>
.kmb-filters{display:flex;flex-wrap:wrap;gap:9px;justify-content:center;margin:0 0 16px}
.kmb-chip{font:inherit;font-size:.9rem;cursor:pointer;padding:8px 16px;border-radius:999px;
	border:1px solid var(--line-2);background:var(--panel-2);color:inherit;transition:.18s}
.kmb-chip:hover{border-color:var(--line)}
.kmb-chip.is-active{background:var(--gold);border-color:var(--gold);color:#fff;font-weight:700}
.kmb-count{text-align:center;color:var(--muted);font-size:.9rem;margin:0 0 22px}
.kmb-state{text-align:center;color:var(--muted);padding:12px}
.kmb-card{display:flex;flex-direction:column;overflow:hidden;
	background:linear-gradient(180deg,var(--panel),var(--panel-2));
	border:1px solid var(--line-2);border-radius:var(--radius);
	transition:transform .22s,border-color .22s,box-shadow .22s}
.kmb-card.is-hidden{display:none}
.kmb-card:hover{transform:translateY(-6px);border-color:var(--line);box-shadow:var(--shadow)}
.kmb-cover{position:relative;aspect-ratio:3/4;overflow:hidden;display:flex;align-items:center;justify-content:center;
	background:radial-gradient(circle at 30% 25%,rgba(34,197,94,.20),rgba(34,197,94,.04))}
.kmb-cover img{width:100%;height:100%;object-fit:cover;display:block}
.kmb-ph{font-size:2.6rem;opacity:.5}
.kmb-pages{position:absolute;top:10px;right:10px;background:rgba(0,0,0,.62);color:#fff;font-size:.72rem;padding:4px 9px;border-radius:999px}
.kmb-tag{position:absolute;bottom:10px;left:10px;background:var(--gold);color:#fff;font-size:.72rem;font-weight:700;padding:4px 9px;border-radius:999px}
.kmb-body{padding:15px 16px 17px;display:flex;flex-direction:column;flex:1;gap:7px;min-width:0}
.kmb-name{font-size:1.02rem;font-weight:700;margin:0;line-height:1.4;overflow-wrap:break-word}
.kmb-by{font-size:.82rem;color:var(--muted);margin:0}
.kmb-desc{font-size:.86rem;color:var(--muted);margin:0 0 4px;flex:1;overflow-wrap:break-word}
.kmb-btns{display:flex;flex-wrap:wrap;gap:8px}
.kmb-btns .btn{flex:1 1 140px;min-width:0;text-align:center;font-size:.84rem;padding:9px 10px;white-space:normal;overflow-wrap:break-word;line-height:1.3}
.kmb-foot{text-align:center;margin-top:40px;padding-top:24px;border-top:1px solid var(--line-2);color:var(--muted)}
@media(max-width:560px){
	.kmb-btns .btn{flex:1 1 100%;font-size:.78rem;padding:8px 10px}
	.kmb-pages{font-size:.68rem;padding:3px 7px}
	.kmb-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
	.kmb-body{padding:12px}
	.kmb-name{font-size:.92rem}
	.kmb-desc{display:none}
}
</style>

<script>
(function(){
	var f=document.getElementById('kmbFilters');
	if(!f) return;
	var cards=[].slice.call(document.querySelectorAll('.kmb-card'));
	var count=document.getElementById('kmbCount');
	var total=cards.length;
	f.addEventListener('click',function(e){
		var b=e.target.closest('.kmb-chip');
		if(!b) return;
		[].forEach.call(f.querySelectorAll('.kmb-chip'),function(c){c.classList.remove('is-active');});
		b.classList.add('is-active');
		var want=b.getAttribute('data-lang'),shown=0;
		cards.forEach(function(c){
			var ok=(want==='all'||c.getAttribute('data-lang')===want);
			c.classList.toggle('is-hidden',!ok);
			if(ok) shown++;
		});
		count.textContent= shown ? ('மொத்தம் '+total+' நூல்களில் '+shown+' காட்டப்படுகிறது')
			: '😔 இந்த மொழியில் நூல்கள் எதுவும் இல்லை. வேறு மொழியைத் தேர்ந்தெடுக்கவும்.';
	});
})();
</script>

<?php get_footer(); ?>
