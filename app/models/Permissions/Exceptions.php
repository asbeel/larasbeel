<?php namespace Models\Permissions;

class PermissionNotFoundException extends  \OutOfBoundsException {}
class PermissionExistsException extends \UnexpectedValueException {}
class NameRequiredException extends \UnexpectedValueException {}
class ValueRequiredException extends \UnexpectedValueException {}