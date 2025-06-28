<?php
/* Smarty version 5.5.1, created on 2025-06-28 18:42:55
  from 'file:utente/struttura_dettaglio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68601b8f700e21_15643125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de2d7a8b299628f64e0bf83443e5164a3889b44f' => 
    array (
      0 => 'utente/struttura_dettaglio.tpl',
      1 => 1751127364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/appbar.tpl' => 1,
  ),
))) {
function content_68601b8f700e21_15643125 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_109171415468601b8f6e9110_51555336', "contenuto");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/base.tpl", $_smarty_current_dir);
}
/* {block "contenuto"} */
class Block_109171415468601b8f6e9110_51555336 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Casette_Dei_Desideri\\libs\\Smarty\\templates\\utente';
?>


<?php $_smarty_tpl->renderSubTemplate("file:partials/appbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<h2><?php echo $_smarty_tpl->getValue('struttura')->getTitolo();?>
</h2>
<p><?php echo $_smarty_tpl->getValue('struttura')->getDescrizione();?>
</p>

<h3>Galleria immagini</h3>
<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('foto')) > 0) {?>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('foto'), 'f');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('f')->value) {
$foreach0DoElse = false;
?>
            <?php if ((true && (true && null !== ($_smarty_tpl->getValue('f')->base64img ?? null)))) {?>
                <img src="<?php echo $_smarty_tpl->getValue('f')->base64img;?>
" alt="foto" style="max-width: 200px;">
            <?php }?>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
<?php } else { ?>
    <p>Nessuna immagine disponibile.</p>
<?php }?>

<hr>
<h3>Prenota il tuo soggiorno</h3>
<form method="post" action="/Casette_Dei_Desideri/Prenotazione/calcola">
    <input type="hidden" name="idStruttura" value="<?php echo $_smarty_tpl->getValue('struttura')->getId();?>
">

    <label for="dataInizio">Data inizio:</label>
    <input type="date" id="dataInizio" name="dataInizio" required>

    <label for="dataFine">Data fine:</label>
    <input type="date" id="dataFine" name="dataFine" required>

    <label for="numOspiti">Numero ospiti (max <?php echo $_smarty_tpl->getValue('struttura')->getNumOspiti();?>
):</label>
    <input type="number" id="numOspiti" name="numOspiti" min="1" max="<?php echo $_smarty_tpl->getValue('struttura')->getNumOspiti();?>
" required>

    <br><br>
    <button type="submit">Procedi alla prenotazione</button>
</form>

<?php echo '<script'; ?>
>
    const intervalliDisponibili = [
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('intervalli'), 'i', true);
$_smarty_tpl->getVariable('i')->iteration = 0;
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('i')->value) {
$foreach1DoElse = false;
$_smarty_tpl->getVariable('i')->iteration++;
$_smarty_tpl->getVariable('i')->last = $_smarty_tpl->getVariable('i')->iteration === $_smarty_tpl->getVariable('i')->total;
$foreach1Backup = clone $_smarty_tpl->getVariable('i');
?>
            {
                inizio: '<?php echo $_smarty_tpl->getValue('i')->getDataI()->format("Y-m-d");?>
',
                fine: '<?php echo $_smarty_tpl->getValue('i')->getDataF()->format("Y-m-d");?>
'
            }<?php if (!$_smarty_tpl->getVariable('i')->last) {?>,<?php }?>
        <?php
$_smarty_tpl->setVariable('i', $foreach1Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    ];

    const dateOccupate = [
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('prenotazioni'), 'p', true);
$_smarty_tpl->getVariable('p')->iteration = 0;
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('p')->value) {
$foreach2DoElse = false;
$_smarty_tpl->getVariable('p')->iteration++;
$_smarty_tpl->getVariable('p')->last = $_smarty_tpl->getVariable('p')->iteration === $_smarty_tpl->getVariable('p')->total;
$foreach2Backup = clone $_smarty_tpl->getVariable('p');
?>
            {
                inizio: '<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('p')->getPeriodo()->getDataI(),"%d/%m/%Y");?>
',
                fine: '<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('p')->getPeriodo()->getDataF(),"%d/%m/%Y");?>
'
            }<?php if (!$_smarty_tpl->getVariable('p')->last) {?>,<?php }?>
        <?php
$_smarty_tpl->setVariable('p', $foreach2Backup);
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    ];

    function isInIntervallo(dateStr) {
        const date = new Date(dateStr);
        return intervalliDisponibili.some(i => {
            return date >= new Date(i.inizio) && date <= new Date(i.fine);
        });
    }

    function isOccupata(dateStr) {
        const date = new Date(dateStr);
        return dateOccupate.some(p => {
            return date >= new Date(p.inizio) && date <= new Date(p.fine);
        });
    }

    function validateDate(input) {
        const val = input.value;
        if (val && (!isInIntervallo(val) || isOccupata(val))) {
            alert('La data ' + val + ' non è disponibile.');
            input.value = '';
        }
    }

    document.getElementById('dataInizio').addEventListener('change', e => validateDate(e.target));
    document.getElementById('dataFine').addEventListener('change', e => validateDate(e.target));
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "contenuto"} */
}
