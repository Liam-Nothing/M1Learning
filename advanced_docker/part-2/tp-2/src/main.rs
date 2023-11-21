fn main() {
    println!("Hello, world!");
}

#[test]
fn test_fail() {
    panic!("Une erreur");
    assert_eq!(1, 1);
}