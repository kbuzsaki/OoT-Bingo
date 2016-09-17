
// process.argv will be ["node", "/path/to/file", "arg1", "arg2", "etc"]
// so argv needs to be at least length 3 to have a seed argument
if (process.argv.length < 3) {
    console.error("No seed specified!");
    process.exit(1);
}
seed = process.argv[2];
mode = process.argv[3] || "normal";

// seed is expected to be a string, so just use it directly
options = {"seed": seed, "mode": mode};
card = ootBingoGenerator(bingoList, options);

console.log(card);

