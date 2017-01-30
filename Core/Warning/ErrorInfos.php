<?php
/**
 * Created by PhpStorm.
 * User: sjhc1170
 * Date: 25/01/2017
 * Time: 14:35
 */

namespace UltimatePHPValidation\Core\Warning;

/**
 * Class ErrorInfos
 * @package UltimatePHPValidation\Core\Warning
 */
class ErrorInfos
{
    private static $ERRORS = [
    'INVALID_ADDRESS'=>'Le champs %s n\'est pas un nom de rue valide!',//CONTAINS
    'INVALID_ARGS'=>'Invalid Argument passed for %s validation',
    'INVALID_RULE_NAME'=>'"%s" n\'est pas une methode de validation connue!',
    'UNKNOWN_ERROR'=>'Une erreur inconnue est survenue lors de la validation du champ: %s ',
    'INVALID_CHARSET_LIST'=>'La liste des type d\'encodage est invalide',
    'NOT_FOUND'=>'Le champs %s est introuvable!',
    'TOO_YOUNG'=>'',
    'NOT_VALID_SUBJECT'=>'',
    'NOT_ASCII_STRING'=>'',
    'NOT_VALID_UTF8'=>'',
    'NO_OPERATOR_FOUND'=>'impossible de valider le champs "%s": veuiller renseigner l\'opérateur de comparaison',
    'NOT_LESS_EQUALS'=>'La valeur du champs %s doit être au plus égale à: %s !',
    'CF_NOT_FOUND'=>'Le champs temoin est introuvable. validation de %s impossible!',
    'NOT_ALNUM'=>'Le champs %s ne doit contenir que des chiffres des lettres!',
    'NOT_ALPHA'=>'Le champs %s ne doit contenir que des caracteres alphabetiques!',
    'MIN_GREATER_THAN_MAX'=>'La valeur minimum \'%s\' ne peut etre superieur au  maximum \'%s\'!',
    'NOT_BBAN_NUM'=>'Le champs %s n\'est pas un numéro de rélevé d\'identité bancaire valide',
    'NOT_IN_RANGE'=>'La valeur du champs %s doit être un nombre comprise entre %s et %s.', //BETWEEN, RANGE
    'NOT_BOOLEAN'=>'Le champs %s doit être de type booléen: [ 0, 1, true, false ]',
    'NOT_A_VALID_CCNUM'=>'La valeur du champs %s n\'est pas un numero de carte de credit valide.',
    'INVALID_CHARSET'=>'La valeur du champs %s n\'est pas un type d\'encodage connu.',
    'INVALID_CITYNAME'=>'La valeur du champs %s n\'est pas un nom de ville valide. ',
    'NOT_VALID_COLOR'=>'Le champs %s n\'est pas un code de couleur valide!',
    'NOT_GEO_COORDINATE'=>'Le champs %s n\'est pas une representation correcte des geo coordonnées!',
    'NOT_COUNTRY_ISOCODE'=>'La valeur du champs %s n\'est pas un code ISO de pays',
    'NOT_CURRENCY_CODE'=>'La valeur du champs %s n\'est pas un code monétaire!',
    'NO_MATCH_PATTERN'=>'La valeur du champs %s ne respecte pas les conditions requises.',
    'NOT_VALID_DATE'=>'La valeur du champs %s n\'est pas une date valide!',
    'NOT_DECIMAL'=>'La valeur du champs %s doit être un nombre decimal.',
    'NOT_DIFFERENT'=>'La valeur du champs %s ne peut être égale à %s.',
    'NOT_VALID_EMAIL'=>'Le champs %s n\'est pas une adresse Email valide!',
    'NOT_ENDING_WITH'=>'Le champ %s doit se terminer par %s',
    'NOT_EQUALS'=>'La valeur du champs %s doit être egale à %s.',
    'NOT_EXECUTABLE'=>'La valeur du champs %s n\'est pas un programme!',
    'NOT_FIBONNACI_NUM'=>'La valeur du champs %s doit etre une nombre Fibonacci valide',
    'F_MUST_MATCHES'=>'Les champs %s  et %s doivent être identiques.',
    'F_MUST_NOT_MATCHES'=>'Les champs %s  et %s ne peuvent être identiques.',
    'NOT_FILE'=>'Les champs %s  doit être un fichier.',
    'INVALID_FILENAME'=>'La valeur du champs %s n\'est pas un nom de fichier valide!',
    'NOT_FLOAT_NUM'=>'Le champs %s n\'est pas une representation à virgule flottante d\'un entier ',
    'NOT_GREATER_EQUALS'=>'La valeur du champs %s doit être au moins égale à: %s !',
    'NOT_GREATER_THAN'=>'La valeur du champs %s ne peut être inferieure à %s !',
    'NOT_HOSTNAME'=>'La valeur du champs %s n\'est pas un nom de domaine valide!',
    'NOT_VALID_IBAN'=>'La valeur du champs %s n\'est pas un numéro d\'identification international de compte bancaire valide!',
    'NOT_IMAGE_FILE'=>'Le champs %s doit être un fichier de type image !',
    'NOT_IMEI'=>'Le champs %s n\'est pas un numéro IMEI valide !',
    'NOT_INFINITE'=>'Le champ %s doit être un nombre infini',
    'NOT_INTEGER'=>'Le champ %s doit être un nombre entier',
    'NOT_VALID_IP'=>'Le champs %s n\'est pas une adresse IP valide!',
    'NOT_JSON_STRING'=>'La chaine %s doit etre de type Json',
    'NOT_LAT_COORDINATE'=>'Le champs %s n\'est pas une representation connue de la latitude!',
    'NOT_LEAP_YEAR'=>'Le champ %s doit correspondre à une année bissextile',
    'NOT_LONG_COORDINATE'=>'Le champs %s n\'est pas une representation  connue de la longetude!',
    'NOT_MAC_ADDR'=>'Le champs %s n\'est pas une adresse MAC valide!',
    'LENGTH_GREATER_THAN_MAX'=>'Le nombre de caracteres du champs %s est supérieur au maximun autorisé: %s .',
    'LENGTH_LESS_THAN_MIN'=>'Le nombre de caracteres du champs %s est inferieur au minimun autorisé: %s .',
    'LENGTH_NOT_IN_RANGE'=>'Le nombre de caracteres du champs %s doit être compris entre %s  et %s .',
    'NOT_LESS_THAN'=>'La valeur du champs %s ne peut être superieure à %s !',
    'NOT_HUMAN_NAME'=>'Le champs %s contient des caracteres non autorisés',
    'NOT_NUMERIC'=>'La valeur du champs %s doit être un nombre!',
    'INVALID_PASSWORD'=>'Le champs %s est trop court, ou trop simple. Criteres: Au moins (1 Majuscule, 1 Minuscule, 1 chiffre, 1 symbole)',
    'NOT_VALID_PHONE'=>'La valeur du champs %s n\'est pas un numéro de telephone valide!',
    'NOT_PRICE'=>'Le champ %s doit être un montant (symbole monétaire inclus)',
    'EMPTY_VALUE'=>'Le champs %s ne peut etre vide.',
    'NOT_ROMAN'=>'Le champs %s doit être une ecriture romane.',
    'INVALID_SEARCH_QUERY'=>'Le champs de recherche %s contient des caracteres non autorisés.',
    'NOT_SIREN'=>'Le champs %s n\'est pas un numéro de SIREN valide !',
    'NOT_SIRET'=>'Le champs %s n\'est pas un numéro de SIRET valide !',
    'NOT_STARTING_WITH'=>'Le champ %s doit commencer par %s',
    'INVALID_TEXT'=>'Certains elements du champs %s sont dangereux pour la securité de votre application.',
    'NOT_VALID_TIME'=>'Le champs %s n\'est pas un format d\'heure connu.',
    'NOT_URL'=>'Le champs %s n\'est pas une URL',
    'INVALID_USERNAME'=>'Votre identifiant de connexion (champs: %s) est invalide',
    'NOT_UUID'=>'Le champs %s n\'est pas un identifiant unique(UUID) valide',
    'NOT_VAT'=>'Le champs %s n\'est pas un numéro de TVA valide',
    'NOT_ZIPCODE'=>'Le champs %s n\'est pas un numéro de code postal valide',
];

    /**
     * @param $ErrorCode
     * @return string
     */
    public static function getStatement($ErrorCode)
    {
        if($ErrorCode) $ErrorCode = strtoupper($ErrorCode);
        if(!$ErrorCode OR !isset(self::$ERRORS[$ErrorCode]))
            return self::$ERRORS['UNKNOWN_ERROR'];
        return self::$ERRORS[$ErrorCode];
    }
}
